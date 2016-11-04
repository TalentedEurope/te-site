<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Company;
use App\Models\User;
use App\Models\ValidationRequest;
use App\Models\StudentStudy;
use App\Models\StudentLanguage;
use App\Models\StudentTraining;
use App\Models\StudentExperience;
use App\Models\PersonalSkill;
use App\Models\ProfessionalSkill;
use App\Http\Controllers\Api\LoginController;
use App;
use Auth;
use Illuminate\Support\MessageBag;
use Validator;
use Image;
use Session;
use JWTAuth;
use Config;

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
        if (!$user->is_filled) {
            return view('profile.empty');
        }
        return $this->showProfile($user);
    }

    public function getProfile(Request $request, $slug, $id)
    {
        $user = User::findOrFail($id);
        $public = Auth::user() == null;
        if (!$user->is_filled || !$user->visible || $user->banned) {
            App::abort(404, 'Not found.');
        }
        return $this->showProfile($user, $public);
    }

    public function getEdit(Request $request)
    {
        $user = Auth::user();
        if ($user->isA('student')) {
            $data = $this->getStudentPrivateData($user);
            $data['token'] = LoginController::userToken();
            return view('profile.student-edit', $data);
        }

        if ($user->isA('company')) {
            $data = $this->getCompanyPrivateData($user);
            $data['token'] = LoginController::userToken();
            return view('profile.company-edit', $data);
        }

        if ($user->isA('institution')) {
            return view('profile.institution-edit');
        }

        if ($user->isA('validator')) {
            return view('profile.validator-edit');
        }
    }

    public function postEdit(Request $request)
    {
        $user = Auth::User();
        $errors = $this->processUser($request, $user);
        $request->session()->flash('success_message', 'Changes saved succesfully');
        if (sizeof($errors)) {
            $request->session()->flash('error_message', 'Warning: Some fields couldn\'t be saved because there were errors, check each field to see the issues');
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

    protected function processCommon(Request $request, User $user)
    {
        $errors = new MessageBag();

        $v = Validator::make($request->all(), User::rules(false, false, $user));
        $v->setAttributeNames(User::$niceNames);

        $errors = $errors->merge($v);
        foreach ($v->valid() as $key => $value) {
            if (array_has($user['attributes'], $key) && !$request->has('validate')) {
                $user->$key = $value;
            }
        }

        // Password reset.
        // Unlike the other fields we only check them if they're passed
        if ($request->has('password') || $request->has('password_confirm')) {
            $rules = array(
                    'password' => 'required|min:8',
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
            $img = Image::make($request->file('image'))
            ->resize(User::$photoWidth, User::$photoHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save($fname);
            $user->image = basename($fname);
        }
        $user->save();
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

        foreach ($v->valid() as $key => $value) {
            if (array_has($company['attributes'], $key) && !$request->has('validate')) {
                $company->$key = $value;
            }
        }

        $errors = $errors->merge($v);

        // Related columns
        $v = Validator::make($request->all(), Company::rulesRelated('personalSkills'));
        if ($v->passes()) {
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

        $user->is_filled = false;
        $uFilledVal = Validator::make($user->toArray(), User::Rules(false, true));
        $filledVal = Validator::make($company->toArray(), Company::Rules($company));
        if ($uFilledVal->passes() && $filledVal->passes()) {
            $user->is_filled = true;
        }

        $company->save();
        $user->save();
        $errors = $errors->merge($v);
        return $errors;
    }

    protected function processStudent(Request $request, User $user)
    {
        if ($request->has('remove_studies')) {
            $studies = $request->input('remove_studies');
            StudentStudy::whereIn('id', $studies)->delete();
        }

        if ($request->has('remove_languages')) {
            $langs = $request->input('remove_languages');
            StudentLanguage::whereIn('id', $langs)->delete();
        }

        if ($request->has('remove_trainings')) {
            $training = $request->input('remove_trainings');
            StudentTraining::whereIn('id', $training)->delete();
        }

        if ($request->has('remove_experiences')) {
            $experiences = $request->input('remove_experiences');
            StudentExperience::whereIn('id', $experiences)->delete();
        }

        $errors = new MessageBag();
        $student = null;

        if ($user->userable) {
            $student = $user->userable()->first();
        } else {
            $student = Student::create();
            $student->user()->save($user);
        }

        $v = Validator::make($request->all(), Student::rules());
        $errors = $errors->merge($v);

        foreach ($v->valid() as $key => $value) {
            if (!is_array($value) && array_has($student['attributes'], $key) && !$request->has('validate')) {
                $student->$key = $value;
            }
        }

        if (isset($v->valid()['curriculum']) && !$request->has('validate')) {
            $fname = tempnam(public_path() . Student::$curriculumPath, $user->id);
            unlink($fname);
            $file = $fname . '.pdf';
            $v->valid()['curriculum']->move(public_path() . Student::$curriculumPath, basename($file));
            $student->curriculum = basename($file);
        }

        $student->save();

        // Related columns, those are more complicated than the ones in company so we validate row by row.
        if (isset($v->valid()['studies'])) {
            $studyIds = array();
            foreach ($v->valid()['studies'] as $key => $stud) {
                $itemVal = Validator::make($stud, Student::rulesRelated('studies'));
                $study = new StudentStudy();
                if (!$request->has('validate')) {
                    if (isset($stud['id'])) {
                        $queryLang = StudentStudy::find($stud['id']);
                        if ($queryLang) {
                            $study = $queryLang;
                        }
                    }

                    if (isset($itemVal->valid()['name'])) {
                        $study->name = $stud['name'];
                    }

                    if (isset($itemVal->valid()['institution_name'])) {
                        $study->institution_name = $stud['institution_name'];
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
                $training = new StudentTraining();
                if (!$request->has('validate')) {
                    if (isset($train['id'])) {
                        $queryLang = StudentTraining::find($train['id']);
                        if ($queryLang) {
                            $training = $queryLang;
                        }
                    }
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
                $language = new StudentLanguage();
                if (!$request->has('validate')) {
                    if (isset($lang['id'])) {
                        $queryLang = StudentLanguage::find($lang['id']);
                        if ($queryLang) {
                            $language = $queryLang;
                        }
                    }
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
                $experience = new StudentExperience();
                if (!$request->has('validate')) {
                    if (isset($exp['id'])) {
                        $queryExp = StudentExperience::find($exp['id']);
                        if ($queryExp) {
                            $experience = $queryExp;
                        }
                    }
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
                StudentLanguage::where('student_id', $student->id)->whereNotIn('id', $expIds)->delete();
            }
        }


        if (isset($v->valid()['personalSkills'])) {
            $skills = $v->valid()['personalSkills'];
            if ($skills) {
                $student->personalSkills()->whereNotIn('id', $skills)->detach();
                foreach ($skills as $skillID) {
                    $skill = PersonalSkill::find($skillID);
                    if ($skill && !$student->personalSkills()->find($skillID)) {
                        $student->personalSkills()->attach($skill);
                    }
                }
            }
        }


        if (isset($v->valid()['professionalSkills'])) {
            $skills = $v->valid()['professionalSkills'];
            if ($skills) {
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

        $user->is_filled = false;
        $uFilledVal = Validator::make($user->toArray(), User::Rules(false, true, $user));
        $filledVal = Validator::make($student->toArray(), Student::Rules(true));
        if ($uFilledVal->passes() && $filledVal->passes()) {
            $user->is_filled = true;
        }
        $student->save();
        $user->save();
        //dd($errors);
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
            $user->email = preg_replace('/./', '■', $user->email);
            $user->phone = preg_replace('/./', '■', $user->phone);
            $user->address = preg_replace('/./', '■', $user->address);
            $user->postal_code = preg_replace('/./', '■', $user->postal_code);
            $user->facebook = preg_replace('/./', '■', $user->facebook);
            $user->twitter = preg_replace('/./', '■', $user->twitter);
            foreach ($data['studyLevels'] as $key => $value) {
                $data['studyLevels'][$key] = preg_replace('/./', '■', $value);
            }
            foreach ($data['studyFields'] as $key => $value) {
                $data['studyFields'][$key] = preg_replace('/./', '■', $value);
            }
            foreach ($data['languages'] as $key => $value) {
                $data['languages'][$key] = preg_replace('/./', '■', $value);
            }
            foreach ($data['languageLevels'] as $key => $value) {
                $data['languageLevels'][$key] = preg_replace('/./', '■', $value);
            }
            foreach ($user->userable->training as $key => $value) {
                $value->name = preg_replace('/./', '■', $value->name);
                $value->date = '0000-00-00';
            }
            foreach ($user->userable->studies as $key => $value) {
                $value->name = preg_replace('/./', '■', $value->name);
                $value->institution_name = preg_replace('/./', '■', $value->institution_name);
            }
            foreach ($user->userable->experiences as $key => $value) {
                $value->from = '0000-00-00';
                $value->until = '0000-00-00';
                $value->company = preg_replace('/./', '■', $value->company);
                $value->position = preg_replace('/./', '■', $value->position);
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
            $languages[$key] = $item['eng'];
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
            'countries' => User::$countries,
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
            $user->email = preg_replace('/./', '■', $user->email);
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
            'countries' => User::$countries,
            'personalSkills' => PersonalSkill::getFormattedArray()
        );
        if ($user->userable) {
            $data['company'] = $user->userable;
        } else {
            $data['company'] = new Company();
        }

        return $data;
    }

    public function getCurriculum(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->userable && $user->userable->curriculum) {
            return response()->download(public_path().Student::$curriculumPath.$user->userable->curriculum);
        }
        App::abort(403, 'Unauthorized action.');
    }

    public function getStudyGradeCard(Request $request, $id, $studyId)
    {
        $user = User::findOrFail($id);
        if ($user->userable && $user->userable->studies()->find($studyId) && $user->userable->studies()->find($studyId)->gradecard) {
            return response()->download(public_path().Student::$studyGradeCardPath.$user->userable->studies()->find($studyId)->gradecard);
        }
        App::abort(403, 'Unauthorized action.');
    }

    public function getStudyCertificate(Request $request, $id, $studyId)
    {
        $user = User::findOrFail($id);
        if ($user->userable && $user->userable->studies()->find($studyId) && $user->userable->studies()->find($studyId)->certificate) {
            return response()->download(public_path().Student::$studyCertificatePath.$user->userable->studies()->find($studyId)->certificate);
        }
        App::abort(403, 'Unauthorized action.');
    }

    public function getTrainingCertificate(Request $request, $id, $studyId)
    {
        $user = User::findOrFail($id);
        if ($user->userable && $user->userable->training()->find($studyId) && $user->userable->training()->find($studyId)->certificate) {
            return response()->download(public_path().Student::$studyCertificatePath.$user->userable->training()->find($studyId)->certificate);
        }
        App::abort(403, 'Unauthorized action.');
    }

    public function getLanguageCertificate(Request $request, $id, $studyId)
    {
        $user = User::findOrFail($id);
        if ($user->userable && $user->userable->languages()->find($studyId) && $user->userable->languages()->find($studyId)->certificate) {
            return response()->download(public_path().Student::$studyCertificatePath.$user->userable->languages()->find($studyId)->certificate);
        }
        App::abort(403, 'Unauthorized action.');
    }

    private function formatRelatedErrors($errors, $mainKey, $subKey)
    {
        $erray = array();
        foreach ($errors->keys() as $key) {
            $erray[$mainKey.'.'.$subKey .'.'. $key] = $errors->get($key);
        }
        return $erray;
    }

    public function getJSONValidatorProfile(Request $request)
    {
        return array(
            'id' => 1,
            'full_name' => 'John Doe',
            'institution_name' => 'Institution name',
            'validated_students' => array(
                array('full_name' => 'Lorem ipsum dolor sit amet'),
                array('full_name' => 'Lorem ipsum dolor sit amet'),
                array('full_name' => 'Lorem ipsum dolor sit amet'),
                array('full_name' => 'Lorem ipsum dolor sit amet'),
            ),
        );
    }
}
