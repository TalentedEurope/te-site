<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Company;
use App\Models\User;
use App\Models\ValidationRequest;
use App\Models\StudentStudy;
use App\Models\StudentLanguage;
use App\Models\PersonalSkill;
use App\Http\Controllers\Api\LoginController;
use Auth;
use Illuminate\Support\MessageBag;
use Validator;
use Image;
use JWTAuth;

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

        return $this->showProfile($user);
    }

    public function getProfile(Request $request, $slug, $id)
    {
        $user = User::findOrFail($id);
        $public = Auth::user() == null;

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
        $user->is_filled = true;

        // Process specific profiles
        if (Auth::user()->isA('company')) {
            $errors = $errors->merge($this->processCompany($request, $user));
        } elseif (Auth::user()->isA('student')) {
            //$errors = $errors->merge($this->processCompany($request));
        }
        // Make sure that the only errors shown are from the fields we passed.
        $reqErrors = new MessageBag();
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

        $v = Validator::make($request->all(), User::rules());
        $v->setAttributeNames(User::$niceNames);

        $errors = $errors->merge($v);
        foreach ($v->valid() as $key => $value) {
            if (array_has($user['attributes'], $key) && !$request->has('validate')) {
                $user->$key = $value;
            }
        }
        $user->is_filled = $this->checkFill($v, $errors);

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
            $fname = tempnam(public_path() . User::$photoPath, $user->id).'.jpg';
            $img = Image::make($request->file('image'))
            ->resize(User::$photoWidth, User::$photoHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save($fname);
            $user->image = basename($fname);
        }
        $errors = $errors->merge($v);

        $user->save();
        return $errors;
    }

    protected function processCompany(Request $request, User $user)
    {
        $errors = new MessageBag();
        $company = null;

        if ($user->userable()) {
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

        $this->is_filled = $this->checkFill($v, $errors);
        $errors = $errors->merge($v);

        // Related columns
        $v = Validator::make($request->all(), Company::rulesRelated('personalSkills'));
        if ($v->passes()) {
            $skills = $request->input('personalSkills');
            $company->personalSkills()->whereNotIn('id', $skills)->detach();
            foreach ($request->input('personalSkills') as $skillID) {
                $skill = PersonalSkill::find($skillID);
                if ($skill && !$company->personalSkills()->find($skillID)) {
                    $company->personalSkills()->attach($skill);
                }
            }
        }

        $company->save();
        $user->save();
        $errors = $errors->merge($v);
        return $errors;
    }

    protected function checkFill($v, $errors)
    {
        $filled = true;

        foreach ($v->getRules() as $key => $rule) {
            foreach ($rule as $check) {
                if (is_string($check) && $check == 'required' && in_array($key, array_keys($errors->messages()))) {
                    $filled = false;
                    break;
                }
            }
        }

        return $filled;
    }

    private function processStudent(Request $request)
    {
        $errors = Validator::make($request->all(), array());

        return errors;
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

        foreach (StudentStudy::$levels as $item) {
            $studyLevels[$item] = trans('regprofile.'.$item);
        }
        foreach (StudentStudy::$fields as $item) {
            $studyFields[$item] = trans('regprofile.'.$item);
        }
        foreach (StudentLanguage::$levels as $item) {
            $languageLevels[$item] = trans('regprofile.'.$item);
        }

        $data = array(
            'user' => $user,
            'countries' => User::$countries,
            'studyLevels' => $studyLevels,
            'studyFields' => $studyFields,
            'languageLevels' => $languageLevels,
            'languages' => StudentLanguage::$languages,
        );
        if ($user->userable) {
            $data['student'] = $user->userable;
            $data['validator'] = $user->userable->validationRequest->validator;
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

    public function getJSONStudentProfile(Request $request)
    {
        return array(
            'id' => 1,
            'full_name' => 'John Doe',
            'studied' => 'Doctorate in Lorem ipsum dolor sit amet Consectetuor',
            'lives_in' => 'Puerto de la Cruz, Spain',
            'nationality' => 'United Kingdom',
            'studied_in' => 'IES Puerto de la Cruz Telesforo Bravo',
            'born_on' => '17 september 1993',
            'my_talent' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut arcu sed odio vestibulum rhoncus et vel est. Ut id odio eu lorem iaculis posuere quis a elit. Nunc dictum placerat eros, eget pulvinar felis tristique eget. Curabitur fermentum purus vel lorem blandit fringilla. Mauris',
            'skills' => array(
                array('name' => 'Lorem ipsum', 'important' => true),
                array('name' => 'Dolor sit amet', 'important' => false),
                array('name' => 'Consectetur adipiscing elit', 'important' => false),
            ),
            'languages' => array('Spanish', 'English', 'French'),
            'photo' => 'http://placekitten.com/g/150/150',
            'validated' => true,
            'email' => 'john@doe.com',
            'phone' => '317-456-2564',
            'address' => '32 Reading rd, Birmingham B26 3QJ, United Kingdom',
            'twitter' => 'http://twitter.com',
        );
    }

    public function getJSONCompanyProfile(Request $request)
    {
        return array(
            'id' => 1,
            'name' => 'John Doe',
            'sector' => 'Company sector',
            'we_are_in' => 'Santa Cruz de Tenerife, Spain.',
            'talent_is' => 'Jelly apple pie icing. Jelly cupcake tiramisu jelly beans marzipan. Cheesecake jelly-o jelly tootsie roll biscuit chocolate macaroon marshmallow. Jelly-o marshmallow tart donut brownie chocolate topping chocolate cake.',
            'skills' => array(
                array('name' => 'Lorem ipsum'),
                array('name' => 'Dolor sit amet'),
                array('name' => 'Consectetur adipiscing elit'),
            ),
            'photo' => 'http://placebear.com/g/150/150',
            'email' => 'john@doe.com',
            'phone' => '317-456-2564',
            'address' => '32 Reading rd, Birmingham B26 3QJ, United Kingdom',
            'twitter' => 'http://twitter.com',
        );
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
