<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Company;
use App\Models\Institution;
use App\Models\User;
use App\Models\ValidationRequest;
use App\Models\StudentStudy;
use App\Models\StudentLanguage;
use App\Models\StudentTraining;
use App\Models\StudentExperience;
use App\Models\PersonalSkill;
use App\Models\ProfessionalSkill;
use App\Notifications\ValidatorRequested;
use App\Notifications\StudentVisited;
use App\Models\Alert;
use Carbon\Carbon;
use App\Http\Controllers\Api\LoginController;
use App;
use Auth;
use Illuminate\Support\MessageBag;
use Validator;
use Image;
use Session;
use JWTAuth;
use Config;
use File;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => array('getProfile')]);
    }

    /* Routes */

    public function getMyProfile(Request $request)
    {
        $user = Auth::user();
        if ($user->isA('validator')) {
            return redirect()->action('ValidationController@index');
        } elseif ($user->isA('institution')) {
            return redirect()->action('ValidatorController@index');
        } elseif (!$user->is_filled) {
            $errors = Validator::make($user->toArray(), User::Rules(false, true));
            if ($user->isA('student')) {
                $filledVal = Validator::make($user->userable->toArray(), Student::Rules(true));
                $filledVal->setAttributeNames(Student::niceNames());
                $errors->errors()->merge($filledVal);
            }
            if ($user->isA('company')) {
                $filledVal = Validator::make($user->userable->toArray(), Company::Rules($user->userable));
                $filledVal->setAttributeNames(Company::niceNames());
                $errors->errors()->merge($filledVal);
            }

            $data['profileErrors'] = array();

            foreach ($errors->errors()->messages() as $error) {
                if (!in_array($error, $data['profileErrors'])) {
                    $data['profileErrors'][] = $error;
                }
            }
            return view('profile.empty', $data);
        }
        return $this->showProfile($user);
    }

    public function getProfile(Request $request, $slug, $id)
    {
        $user = User::findOrFail($id);
        $public = Auth::user() == null;
        if (!$user->is_filled || !$user->visible || $user->banned) {
            App::abort(404, trans('error-page.not_found'));
        }
        if ($user->isA('student') && Auth::user() && Auth::user()->isA('company') && $user->push_id != "") {
            $alerts = array_flatten(Alert::withTrashed()->where('origin_id', Auth::User()->id)->where('target_id', $user->id)->whereDate('created_at', '>', Carbon::now()->subDays(env("MIN_ALERT_DAYS", 1)))->select('target_id')->get()->toArray());
            if (sizeof($alerts) == 0) {
                $alert = new Alert();
                $alert->origin_id = Auth::User()->id;
                $alert->target_id = $user->id;
                $alert->save();
                // Students don't have access to Alerts, but we keep track of them. So we soft delete it, to avoid issues with the notification systems.
                $alert->delete();
                $user->notify(new StudentVisited($user, Auth::user()));
            }
        }


        return $this->showProfile($user, $public);
    }

    public function quit(Request $request)
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        return;
    }

    public function getEdit(Request $request)
    {
        $user = Auth::user();
        if ($user->isA('student')) {
            // Temporal? Recalculate locked status
            $user->userable->calculateLockedStatus();

            $data = $this->getStudentPrivateData($user);
            $data['token'] = LoginController::userToken();

            $validationReqDate = null;
            $student = $user->userable;
            if ($student && $student->validationRequest) {
                $validationReqDate = $student->validationRequest->created_at;
            }
            $data['validationReqDate'] = $validationReqDate;

            $errors = Validator::make($user->toArray(), User::Rules(false, true));
            $errors->setAttributeNames(User::niceNames());
            if ($user->isA('student')) {
                $filledVal = Validator::make($user->userable->toArray(), Student::Rules(true));
                $filledVal->setAttributeNames(Student::niceNames());
                $errors->errors()->merge($filledVal);
            }
            $data['fillRate'] = $user->userable->fillRate();
            $data['institutionCountries'] = Institution::getAvailableCountries($data['nationalities']);
            $data['profileErrors'] = $errors->errors();
            return view('profile.student-edit', $data);
        }

        if ($user->isA('company')) {
            $data = $this->getCompanyPrivateData($user);
            $data['token'] = LoginController::userToken();
            return view('profile.company-edit', $data);
        }

        if ($user->isA('institution')) {
            $data = $this->getInstitutionPrivateData($user);
            $data['token'] = LoginController::userToken();
            return view('profile.institution-edit', $data);
        }

        if ($user->isA('validator')) {
            $data = $this->getValidatorPrivateData($user);
            $data['token'] = LoginController::userToken();
            return view('profile.validator-edit', $data);
        }
    }

    public function postEdit(Request $request)
    {
        $user = Auth::User();
        $errors = $this->processUser($request, $user);
        $request->session()->flash('success_message', trans('reg-profile.changes_saved_successfully'));
        if (sizeof($errors)) {
            $request->session()->flash('error_message', trans('reg-profile.warning_some_fields_has_errors'));
        }
        return back()->withInput()->withErrors($errors);
    }

    private function showProfile($user, $public = false)
    {
        if ($user->isA('student')) {
            $data = $this->getStudentPublicData($user, $public);

            return view('profile.student-view', $data);
        }
        if ($user->isA('company')) {
            $data = $this->getCompanyPublicData($user, $public);
            $data['token'] = LoginController::userToken();


            return view('profile.company-view', $data);
        }
        if ($user->isA('validator')) {
            $data = $this->getValidatorPrivateData($user);
            $data['validator'] = App\Models\Validator::where('id', $data['validator']->id)->with(['validationRequest' => function ($q) {
                $q->whereHas('student', function ($q) {
                    $q->where('valid', 'validated');
                });
            }])->first();
            $data['token'] = LoginController::userToken();
            return view('profile.validator-view', $data);
        }
    }


    protected function processUser(Request $request, User $user)
    {
        $errors = new MessageBag();

        // Process common information for all profiles.
        $errors = $errors->merge($this->processCommon($request, $user));

        // Process specific profiles
        if (Auth::user()->isA('company')) {
            $errors = $errors->merge($this->processCompany($request, $user));
        } elseif (Auth::user()->isA('student')) {
            $errors = $errors->merge($this->processStudent($request, $user));
        } elseif (Auth::user()->isA('institution')) {
            $errors = $errors->merge($this->processInstitution($request, $user));
        } elseif (Auth::user()->isA('validator')) {
            $errors = $errors->merge($this->processValidator($request, $user));
        }
        // Make sure that the only errors shown are from the fields we passed.
        $reqErrors = new MessageBag();
        return $errors;

        // Todo: Fix this so it only returns what the user requires even when passing arrays.
        foreach ($errors->messages() as $key => $value) {
            if (isset($request->all()[$key])) {
                foreach ($value as $message) {
                    $reqErrors->add($key, $message);
                }
            }
        }
        return $reqErrors;
    }

    protected function initialCapitalize($str)
    {
        return ucwords(strtolower($str));
    }

    protected function processCommon(Request $request, User $user)
    {
        $errors = new MessageBag();

        if (Auth::user()->isA('student')) {
            foreach (['name', 'surname', 'city'] as $field) {
                if ($request->has($field)) {
                    $request->offsetSet($field, $this->initialCapitalize($request->input($field)));
                }
            }
        }

        $values = $request->all();
        if (isset($values['twitter']) && starts_with($values['twitter'], '@')) {
            $values['twitter'] = str_replace('@', "http://twitter.com/", $values['twitter']);
        }
        $v = Validator::make($values, User::rules(false, false, $user));
        $v->setAttributeNames(User::niceNames());

        $errors = $errors->merge($v);
        foreach ($v->valid() as $key => $value) {
            if ($key != 'email' && array_has($user['attributes'], $key) && !$request->has('validate')) {
                $user->$key = $value;
            }
        }

        // Password reset.
        // Unlike the other fields we only check them if they're passed
        if ($request->has('password') || $request->has('password_confirm')) {
            $rules = array(
                    'password' => 'required|min:8|same:password_confirm',
                    'password_confirm' => 'required|min:8|same:password',
            );
            $v = Validator::make($request->all(), $rules);
            if ($v->passes() && !$request->has('validate')) {
                $user->password = \Hash::make($request->input('password'));
            }
            $errors = $errors->merge($v);
        }

        // Images don't appear on valid() but since it has a different parse logic
        // we do it aside.
        $v = Validator::make($request->all(), array_filter(User::rules('image')));

        if ($v->passes() && $request->hasFile('image') && !$request->has('validate')) {
            $fname = tempnam(public_path() . User::$photoPath, $user->id);
            unlink($fname);
            $fname .= '.jpg';
            $img = Image::make($request->file('image'));
            $padding = 15;
            if (auth::user()->isA('student')) {
                $img->fit(User::$photoWidth, User::$photoWidth)->save($fname);
            } else {
                if ($img->width() > $img->height()) {
                    $img->resize(User::$photoWidth - $padding, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                } else {
                    $img->resize(null, User::$photoHeight - $padding, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $img->resizeCanvas(User::$photoWidth, User::$photoHeight, "center", false, "ffffff")->save($fname);
            }
            $user->image = basename($fname);
        }        

        if (!$request->has('validate') && $request->has('deletePhoto')) {
            $file = public_path() . User::$photoPath . $user->image;
            $user->image = "";
            if (File::exists($file)) {
                File::delete($file);
            }
        }


        if (!$request->has('validate')) {
            $user->save();
        }
        return $errors;
    }

    protected function processCompany(Request $request, User $user)
    {
        $errors = new MessageBag();
        $company = null;

        if ($user->userable) {
            $company = $user->userable()->first();
        } else {
            $company = Company::create();
            $company->user()->save($user);
        }
        $v = Validator::make($request->all(), Company::rules($company));
        $v->setAttributeNames(Company::niceNames());

        foreach ($v->valid() as $key => $value) {
            if (array_has($company['attributes'], $key) && !$request->has('validate')) {
                $company->$key = $value;
            }
        }

        $errors = $errors->merge($v);

        // Related columns
        $v = Validator::make($request->all(), Company::rulesRelated('personalSkills'));
        if ($v->passes() && !$request->has('validate')) {
            $skills = $request->input('personalSkills');
            if ($skills) {
                $company->personalSkills()->whereNotIn('id', $skills)->detach();
                foreach ($skills as $skillID) {
                    $skill = PersonalSkill::find($skillID);
                    if ($skill && !$company->personalSkills()->find($skillID)) {
                        $company->personalSkills()->attach($skill);
                    }
                }
            }
        }
        if ($request->has('remove_all_personal_skills') && !$request->has('validate')) {
            $company->personalSkills()->detach();
        }

        if ($request->input('is_ngo') == "on") {
            $company->is_ngo = true;
        } else {
            $company->is_ngo = false;
        }

        $user->is_filled = false;
        $uFilledVal = Validator::make($user->toArray(), User::Rules(false, true));
        $filledVal = Validator::make($company->toArray(), Company::Rules($company));
        if ($uFilledVal->passes() && $filledVal->passes()) {
            $user->is_filled = true;
        }
        if (!$request->has('validate')) {
            $company->save();
            $user->save();
        }
        $errors = $errors->merge($v);
        return $errors;
    }


    protected function processInstitution(Request $request, User $user)
    {
        $errors = new MessageBag();
        $institution = null;

        if ($user->userable) {
            $institution = $user->userable()->first();
        } else {
            $institution = Institution::create();
            $institution->user()->save($user);
        }
        $v = Validator::make($request->all(), Institution::rules($institution));
        $v->setAttributeNames(Institution::niceNames());
        foreach ($v->valid() as $key => $value) {
            if ($key == "certificate" && !$request->has('validate')) {
                $fname = tempnam(public_path() . Institution::$certificatePath, $user->id);
                unlink($fname);
                $extension = ".".$value->extension();
                $file = $fname . $extension;
                $value->move(public_path() . Institution::$certificatePath, basename($file));
                $institution->$key = basename($file);
            } elseif (array_has($institution['attributes'], $key) && !$request->has('validate')) {
                $institution->$key = $value;
            }
        }


        $errors = $errors->merge($v);

        $user->is_filled = false;
        $uFilledVal = Validator::make($user->toArray(), User::Rules(false, true));
        $filledVal = Validator::make($institution->toArray(), Institution::rules($institution, false, true));
        if ($uFilledVal->passes() && $filledVal->passes()) {
            $user->is_filled = true;
        }

        if (!$request->has('validate')) {
            $institution->save();
            $user->save();
        }
        $errors = $errors->merge($v);
        return $errors;
    }

    protected function processValidator(Request $request, User $user)
    {
        $errors = new MessageBag();
        $validator = null;

        if ($user->userable) {
            $validator = $user->userable()->first();
        } else {
            $validator = \App\Models\Validator::create();
            $validator->user()->save($user);
        }
        $v = Validator::make($request->all(), \App\Models\Validator::rules($validator));
        $v->setAttributeNames(\App\Models\Validator::niceNames());
        foreach ($v->valid() as $key => $value) {
            if (array_has($validator['attributes'], $key) && !$request->has('validate')) {
                $validator->$key = $value;
            }
        }

        if ($request->has('leave')) {
            $validator->institution_id = null;
        }


        $errors = $errors->merge($v);

        $user->is_filled = false;

        $uFilledVal = Validator::make($user->toArray(), User::Rules(false, true, false, true));
        $filledVal = Validator::make($validator->toArray(), \App\Models\Validator::rules($validator));
        if ($uFilledVal->passes() && $filledVal->passes()) {
            $user->is_filled = true;
        }

        if (!$request->has('validate')) {
            $validator->save();
            $user->save();
        }
        $errors = $errors->merge($v);
        return $errors;
    }

    protected function processStudent(Request $request, User $user)
    {
        $errors = new MessageBag();
        $student = null;
        $validationReqDate = null;

        if ($user->userable) {
            $student = $user->userable()->first();
        } else {
            $student = Student::create();
            $student->user()->save($user);
        }

        if ($student->validationRequest) {
            $validationReqDate = $student->validationRequest->created_at;
        }

        if ($request->has('remove_studies')) {
            $studies = $request->input('remove_studies');
            $ids = $studies;
            if ($validationReqDate) {
                $ids = array();
                foreach ($studies as $study) {
                    $study = StudentStudy::find($study);
                    if ($study && !$study->locked) {
                        $ids[] = $study->id;
                    }
                }
            }

            StudentStudy::whereIn('id', $ids)->delete();
        }

        if ($request->has('remove_languages')) {
            $langs = $request->input('remove_languages');
            $ids = $langs;
            if ($validationReqDate) {
                $ids = array();
                foreach ($langs as $lang) {
                    $lang = StudentLanguage::find($lang);
                    if ($lang && !$lang->locked) {
                        $ids[] = $lang->id;
                    }
                }
            }

            StudentLanguage::whereIn('id', $ids)->delete();
        }

        if ($request->has('remove_trainings')) {
            $trainings = $request->input('remove_trainings');
            $ids = $trainings;
            if ($validationReqDate) {
                $ids = array();
                foreach ($trainings as $training) {
                    $training = StudentTraining::find($training);
                    if ($training && !$training->locked) {
                        $ids[] = $training->id;
                    }
                }
            }

            StudentTraining::whereIn('id', $ids)->delete();
        }

        if ($request->has('remove_experiences')) {
            $experiences = $request->input('remove_experiences');
            $ids = $experiences;
            if ($validationReqDate) {
                $ids = array();
                foreach ($experiences as $experience) {
                    $experience = StudentExperience::find($experience);
                    if ($experience && !$experience->locked) {
                        $ids[] = $experience->id;
                    }
                }
            }

            StudentExperience::whereIn('id', $ids)->delete();
        }

        $v = Validator::make($request->all(), Student::rules());
        $v->setAttributeNames(Student::niceNames());
        $errors = $errors->merge($v);

        foreach ($v->valid() as $key => $value) {
            if (!is_array($value) && array_has($student['attributes'], $key) && !$request->has('validate')) {
                $student->$key = $value;
            }
        }

        if (sizeof($v->errors()->get('curriculum')) == 0 && isset($request->all()['curriculum']) && !$request->has('validate')) {
            $fname = tempnam(public_path() . Student::$curriculumPath, $user->id);
            unlink($fname);
            $file = $fname . '.pdf';
            $request->all()['curriculum']->move(public_path() . Student::$curriculumPath, basename($file));
            $student->curriculum = basename($file);
        }

        if (!$request->has('validate')) {
            $student->save();
        }

        // Related columns, those are more complicated than the ones in company so we validate row by row.
        if (isset($v->valid()['studies'])) {
            $studyIds = array();
            foreach ($v->valid()['studies'] as $key => $stud) {
                $itemVal = Validator::make($stud, Student::rulesRelated('studies'));
                $itemVal->setAttributeNames(Student::relatedNiceNames('studies'));

                $study = new StudentStudy();

                if (isset($stud['id'])) {
                    $queryLang = StudentStudy::find($stud['id']);
                    if ($queryLang) {
                        $study = $queryLang;
                    }
                }

                if (isset($stud['id']) && $study->locked) {
                    $studyIds[] = $stud['id'];
                }


                if (!$request->has('validate') && !$study->locked) {
                    if (isset($itemVal->valid()['name'])) {
                        $study->name = $stud['name'];
                    }

                    if (isset($itemVal->valid()['institution_name'])) {
                        $study->institution_name = $this->initialCapitalize($stud['institution_name']);
                    }

                    if (isset($itemVal->valid()['level'])) {
                        $study->level = $stud['level'];
                    }

                    if (isset($itemVal->valid()['field'])) {
                        $study->field = $stud['field'];
                    }

                    if (sizeof($itemVal->errors()->get('gradecard')) == 0 && isset($stud['gradecard'])) {
                        $fname = tempnam(public_path() . Student::$studyGradeCardPath, $user->id);
                        unlink($fname);
                        $file = $fname . '.pdf';
                        $stud['gradecard']->move(public_path() . Student::$studyGradeCardPath, basename($file));
                        $study->gradecard = basename($file);
                    }


                    if (sizeof($itemVal->errors()->get('certificate')) == 0 && isset($stud['certificate'])) {
                        $fname = tempnam(public_path() . Student::$studyCertificatePath, $user->id);
                        unlink($fname);
                        $file = $fname . '.pdf';
                        $stud['certificate']->move(public_path() . Student::$studyCertificatePath, basename($file));
                        $study->certificate = basename($file);
                    }
                    $study->student_id = $student->id;
                    $study->save();
                    $studyIds[] = $study->id;
                    $errors = $errors->merge($this->formatRelatedErrors($itemVal->errors(), 'studies', $study->id));
                } else {
                    $errors = $errors->merge($this->formatRelatedErrors($itemVal->errors(), 'studies', $key));
                }
            }
            if (sizeof($studyIds)) {
                StudentStudy::where('student_id', $student->id)->whereNotIn('id', $studyIds)->delete();
            }
        }

        if (isset($v->valid()['trainings'])) {
            $trainIds = array();
            foreach ($v->valid()['trainings'] as $key => $train) {
                $itemVal = Validator::make($train, Student::rulesRelated('trainings'));
                $itemVal->setAttributeNames(Student::relatedNiceNames('trainings'));

                $training = new StudentTraining();

                if (isset($train['id'])) {
                    $queryLang = StudentTraining::find($train['id']);
                    if ($queryLang) {
                        $training = $queryLang;
                    }
                }

                if (isset($train['id']) && $training->locked) {
                    $trainIds[] = $train['id'];
                }

                if (!$request->has('validate') && !$training->locked) {
                    if (isset($itemVal->valid()['name'])) {
                        $training->name = $train['name'];
                    }
                    if (isset($itemVal->valid()['date'])) {
                        $training->date = $train['date'];
                    }
                    if (sizeof($itemVal->errors()->get('certificate')) == 0 && isset($train['certificate'])) {
                        $fname = tempnam(public_path() . Student::$studyCertificatePath, $user->id);
                        unlink($fname);
                        $file = $fname . '.pdf';
                        $train['certificate']->move(public_path() . Student::$studyCertificatePath, basename($file));
                        $training->certificate = basename($file);
                    }
                    $training->student_id = $student->id;
                    $training->save();
                    $trainIds[] = $training->id;
                    $errors = $errors->merge($this->formatRelatedErrors($itemVal->errors(), 'trainings', $training->id));
                } else {
                    $errors = $errors->merge($this->formatRelatedErrors($itemVal->errors(), 'trainings', $key));
                }
            }
            if (sizeof($trainIds)) {
                StudentTraining::where('student_id', $student->id)->whereNotIn('id', $trainIds)->delete();
            }
        }

        if (isset($v->valid()['languages'])) {
            $langIds = array();
            foreach ($v->valid()['languages'] as $key => $lang) {
                $itemVal = Validator::make($lang, Student::rulesRelated('languages'));
                $itemVal->setAttributeNames(Student::relatedNiceNames('languages'));
                $language = new StudentLanguage();

                if (isset($lang['id'])) {
                    $queryLang = StudentLanguage::find($lang['id']);
                    if ($queryLang) {
                        $language = $queryLang;
                    }
                }

                if (isset($lang['id']) && $language->locked) {
                    $langIds[] = $lang['id'];
                }

                if (!$request->has('validate') && !$language->locked) {
                    if (isset($itemVal->valid()['name'])) {
                        $language->name = $lang['name'];
                    }
                    if (isset($itemVal->valid()['level'])) {
                        $language->level = $lang["level"];
                    }
                    if (sizeof($itemVal->errors()->get('certificate')) == 0 && isset($lang['certificate'])) {
                        $fname = tempnam(public_path() . Student::$studyCertificatePath, $user->id);
                        unlink($fname);
                        $file = $fname . '.pdf';
                        $lang['certificate']->move(public_path() . Student::$studyCertificatePath, basename($file));
                        $language->certificate = basename($file);
                    }
                    $language->student_id = $student->id;
                    $language->save();
                    $langIds[] = $language->id;
                    $errors = $errors->merge($this->formatRelatedErrors($itemVal->errors(), 'languages', $language->id));
                } else {
                    $errors = $errors->merge($this->formatRelatedErrors($itemVal->errors(), 'languages', $key));
                }
            }
            if (sizeof($langIds)) {
                StudentLanguage::where('student_id', $student->id)->whereNotIn('id', $langIds)->delete();
            }
        }

        if (isset($v->valid()['experiences'])) {
            $expIds = array();
            foreach ($v->valid()['experiences'] as $key => $exp) {
                $itemVal = Validator::make($exp, Student::rulesRelated('experiences'));
                $itemVal->setAttributeNames(Student::relatedNiceNames('experiences'));

                $experience = new StudentExperience();

                if (isset($exp['id'])) {
                    $queryExp = StudentExperience::find($exp['id']);
                    if ($queryExp) {
                        $experience = $queryExp;
                    }
                }

                if (isset($exp['id']) && $experience->locked) {
                    $expIds[] = $exp['id'];
                }

                if (!$request->has('validate') && !$experience->locked) {
                    if (isset($itemVal->valid()['company'])) {
                        $experience->company = $exp['company'];
                    }
                    if (isset($itemVal->valid()['from'])) {
                        $experience->from = $exp["from"];
                    }
                    if (isset($itemVal->valid()['until'])) {
                        $experience->until = $exp["until"];
                    }
                    if (isset($itemVal->valid()['position'])) {
                        $experience->position = $exp['position'];
                    }
                    $experience->student_id = $student->id;
                    $experience->save();
                    $expIds[] = $experience->id;
                    $errors = $errors->merge($this->formatRelatedErrors($itemVal->errors(), 'experiences', $experience->id));
                } else {
                    $errors = $errors->merge($this->formatRelatedErrors($itemVal->errors(), 'experiences', $key));
                }
            }
            if (sizeof($expIds)) {
                StudentExperience::where('student_id', $student->id)->whereNotIn('id', $expIds)->delete();
            }
        }

        if (isset($v->valid()['personalSkills']) && !$validationReqDate && !$request->has('validate')) {
            $skills = $v->valid()['personalSkills'];
            if ($skills) {
                $student->personalSkills()->whereNotIn('id', $skills)->detach();
                foreach ($skills as $skillID) {
                    $skill = PersonalSkill::find($skillID);
                    if ($skill && !$validationReqDate &&  !$student->personalSkills()->find($skillID)) {
                        $student->personalSkills()->attach($skill);
                    }
                }
            }
        }

        if ($request->has('remove_all_personal_skills') && !$validationReqDate && !$request->has('validate')) {
            $student->personalSkills()->detach();
        }

        if (isset($v->valid()['professionalSkills'])) {
            $skills = $v->valid()['professionalSkills'];
            if ($skills && !$request->has('validate')) {
                $skillIds = array();
                // Not a fan of this but theres a bug that makes $student->professionalSkills()->whereNotIn('id', $skillIds)->detach(); fail.
                $student->professionalSkills()->detach();
                foreach ($skills as $skill) {
                    $sk = ProfessionalSkill::where('name', $skill)->where('language_code', Config::get('app.locale'))->first();
                    if (!$sk) {
                        $sk = ProfessionalSkill::create(array('name' => $skill, 'language_code' => Config::get('app.locale')));
                    }
                    $skillIds[] = $sk->id;
                    if ($skill && !$student->professionalSkills()->find($sk->id)) {
                        $student->professionalSkills()->attach($sk);
                    }
                }
            }
        }

        if ($request->has('remove_all_professional_skills') && !$request->has('validate')) {
            $student->professionalSkills()->detach();
        }

        $user->is_filled = false;
        $uFilledVal = Validator::make($user->toArray(), User::Rules(false, true, $user));
        $filledVal = Validator::make(User::find($user->id)->userable->toArray(), Student::Rules(true));
        if ($uFilledVal->passes() && $filledVal->passes()) {
            $user->is_filled = true;
        }

        if (!$request->has('validate')) {
            $student->save();
            $user->save();
        }

        return $errors;
    }

    public function getStudentPublicData($user, $public = false)
    {
        $data = $this->getStudentPrivateData($user);
        $data['public'] = $public;
        if ($user->userable && $user->userable->studies->count()) {
            $data['mainStudy'] = array('name' => $user->userable->studies[0]->name);
            if ($user->userable->studies[0]->level) {
                $data['mainStudy']['level'] = $data['studyLevels'][$user->userable->studies[0]->level];
            }
        }
        if ($public) {
            $user->email = '?';
            $user->phone = '?';
            $user->address = '?';
            $user->postal_code = '?';
            $user->facebook = '?';
            $user->twitter = '?';
            foreach ($data['studyLevels'] as $key => $value) {
                $data['studyLevels'][$key] = '?';
            }
            foreach ($data['studyFields'] as $key => $value) {
                $data['studyFields'][$key] = '?';
            }
            foreach ($data['languages'] as $key => $value) {
                $data['languages'][$key] = '?';
            }
            foreach ($data['languageLevels'] as $key => $value) {
                $data['languageLevels'][$key] = '?';
            }
            foreach ($user->userable->training as $key => $value) {
                $value->name = '?';
                $value->date = '0000-00-00';
            }
            foreach ($user->userable->studies as $key => $value) {
                $value->name = '?';
                $value->institution_name = '?';
            }
            foreach ($user->userable->experiences as $key => $value) {
                $value->from = '0000-00-00';
                $value->until = '0000-00-00';
                $value->company = '?';
                $value->position = '?';
            }
        }

        return $data;
    }

    public function getStudentPrivateData($user)
    {
        $studyLevels = array();
        $studyFields = array();
        $languageLevels = array();
        $languages = array();
        $nationalities = array();        
        foreach (StudentLanguage::$languages as $key => $item) {
            $languages[$key] = $item['name'];
        }
        foreach (StudentStudy::$levels as $item) {
            $studyLevels[$item] = trans('reg-profile.'.$item);
        }
        foreach (StudentStudy::$fields as $item) {
            $studyFields[$item] = trans('reg-profile.'.$item);
        }
        foreach (StudentLanguage::$levels as $item) {
            $languageLevels[$item] = trans('reg-profile.'.$item);
        }

        foreach (Student::$nationalities as $item) {
            $nationalities[$item] = trans('global.'.$item);
        }

        $data = array(
            'user' => $user,
            'countries' => $this->getTranslatedCountries(),
            'nationalities' => $nationalities,
            'studyLevels' => $studyLevels,
            'studyFields' => $studyFields,
            'languageLevels' => $languageLevels,
            'languages' => $languages,
            'personalSkills' => PersonalSkill::getFormattedArray(),
            'professionalSkills' => ProfessionalSkill::where('language_code', Config::get('app.locale'))->get(),
        );

        if ($user->userable) {
            $data['student'] = $user->userable;
            $data['validator'] = "";
            if ($user->userable->validationRequest) {
                $data['validator'] = $user->userable->validationRequest->validator;
            }
        } else {
            $data['student'] = new Student();
        }

        return $data;
    }

    public function getCompanyPublicData($user, $public = false)
    {
        $data = $this->getCompanyPrivateData($user, $public);
        if ($public) {
            $user->email = '?';
        }
        $data['public'] = $public;

        return $data;
    }

    public function getCompanyPrivateData($user)
    {
        $activities = array();
        foreach (Company::$activities as $item) {
            $activities[$item] = trans('reg-profile.'.$item);
        }

        $data = array(
            'user' => $user,
            'activities' => $activities,
            'countries' => $this->getTranslatedCountries(),
            'personalSkills' => PersonalSkill::getFormattedArray()
        );
        if ($user->userable) {
            $data['company'] = $user->userable;
        } else {
            $data['company'] = new Company();
        }

        return $data;
    }


    public function getInstitutionPrivateData($user)
    {
        $countries = array();
        foreach (Student::$nationalities as $value) {
            $countries[$value] = $this->getTranslatedCountries()[$value];
        }

        $data = array(
            'user' => $user,
            'countries' => $countries,
            'types' => Institution::getTypes(true)
        );
        if ($user->userable) {
            $data['institution'] = $user->userable;
        } else {
            $data['institution'] = new Institution();
        }

        return $data;
    }

    public function getValidatorPrivateData($user)
    {
        $data = array(
            'user' => $user,
        );

        if ($user->userable) {
            $data['validator'] = $user->userable;
        } else {
            $data['validator'] = new App\Models\Validator();
        }

        return $data;
    }

    public function getCurriculum(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->userable && $user->userable->curriculum) {
            return response()->download(public_path().Student::$curriculumPath.$user->userable->curriculum);
        }
        App::abort(403, trans('error-page.unauthorized_action'));
    }

    public function getStudyGradeCard(Request $request, $id, $studyId)
    {
        $user = User::findOrFail($id);
        if ($user->userable && $user->userable->studies()->find($studyId) && $user->userable->studies()->find($studyId)->gradecard) {
            return response()->download(public_path().Student::$studyGradeCardPath.$user->userable->studies()->find($studyId)->gradecard);
        }
        App::abort(403, trans('error-page.unauthorized_action'));
    }

    public function getStudyCertificate(Request $request, $id, $studyId)
    {
        $user = User::findOrFail($id);
        if ($user->userable && $user->userable->studies()->find($studyId) && $user->userable->studies()->find($studyId)->certificate) {
            return response()->download(public_path().Student::$studyCertificatePath.$user->userable->studies()->find($studyId)->certificate);
        }
        App::abort(403, trans('error-page.unauthorized_action'));
    }

    public function getInstitutionCertificate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->userable && $user->userable->certificate) {
            return response()->download(public_path().Institution::$certificatePath.$user->userable->certificate);
        }
        App::abort(403, trans('error-page.unauthorized_action'));
    }


    public function getTrainingCertificate(Request $request, $id, $studyId)
    {
        $user = User::findOrFail($id);
        if ($user->userable && $user->userable->training()->find($studyId) && $user->userable->training()->find($studyId)->certificate) {
            return response()->download(public_path().Student::$studyCertificatePath.$user->userable->training()->find($studyId)->certificate);
        }
        App::abort(403, trans('error-page.unauthorized_action'));
    }

    public function getLanguageCertificate(Request $request, $id, $studyId)
    {
        $user = User::findOrFail($id);
        if ($user->userable && $user->userable->languages()->find($studyId) && $user->userable->languages()->find($studyId)->certificate) {
            return response()->download(public_path().Student::$studyCertificatePath.$user->userable->languages()->find($studyId)->certificate);
        }
        App::abort(403, trans('error-page.unauthorized_action'));
    }

    private function getTranslatedCountries() {
        // Todo: cache this
        $countries = User::$countries;
        foreach ($countries as $code => $country) {
            $countries[$code] = trans('global.' . $code);
        }
        return $countries;
    }

    private function formatRelatedErrors($errors, $mainKey, $subKey)
    {
        $erray = array();

        foreach ($errors->keys() as $key) {
            $erray[$mainKey.'.'.$subKey .'.'. $key] = $errors->get($key);
        }
        return $erray;
    }

    public function requestValidation(Request $request)
    {
        if ($request->has('referee')) {
            $val = \App\Models\Validator::find($request->input('referee'));
            if (!$val) {
                App::abort(404, trans('error-page.not_found'));
            }
            ValidationRequest::create([
                'student_id' => Auth::user()->userable->id,
                'validator_id' => $val->id
            ]);
        } else {
            $ins = Institution::find($request->input('institution'));
            if (!$ins) {
                App::abort(404, trans('error-page.not_found'));
            }
            $lowest = INF;
            $lowestValidatorId = null;
            foreach ($ins->validators as $val) {
                $count = $val->validationRequest->count();
                if ($count < $lowest && $val->enabled) {
                    $lowest = $count;
                    $lowestValidatorId = $val->id;
                    if ($lowest == 0) {
                        break;
                    }
                }
            }
            ValidationRequest::create([
                'student_id' => Auth::user()->userable->id,
                'validator_id' => $lowestValidatorId
            ]);
        }
        $request->session()->flash('success_message', trans('reg-profile.successfully_requested_validation_request'));
        return back();
    }

    public function inviteSchool(Request $request, $validate = false)
    {
        $rules = array( 'validator_name' => 'sometimes|required|regex:/^[\pL\s\-\,\.]+$/u' ,
                         'validator_email' => 'sometimes|required|email',
        );
        $v = Validator::make($request->all(), $rules);

        if ($v->passes() && !$validate) {
            $existing = User::where('email', $request->input('validator_email'))->first();
            if ($existing) {
                if ($existing->userable_type == Validator::class) {
                    if ($existing->userable->institution) {
                        $validator->errors()->add('validator_email', sprintf(trans('reg-profile.referee_is_part_of_institution'), $existing->userable->institution->user->name));
                    } else {
                        $validator->errors()->add('validator_email', trans('reg-profile.referee_isnt_part_of_any_institution'));
                    }
                } else {
                    $validator->errors()->add('validator_email', trans('reg-profile.this_email_user_cannot_be_a_referee'));
                }
            } else {
                $this->inviteUser($request->input('validator_name'), $request->input('validator_email'));
                $request->session()->flash('success_message', trans('reg-profile.invitation_sent_successfully'));
                return back();
            }
        }

        if ($validate) {
            return $v->errors();
        }

        return back()->withInput()->withErrors();
    }

    private function inviteUser($name, $email)
    {
        // We create a request
        $request = ValidationRequest::create([
            'student_id' => Auth::user()->userable->id,
            'validator_name' => $name,
            'validator_email' => $email,
        ]);

        // We send an email to the validator
        $request->notify(new ValidatorRequested($request));
    }
}
