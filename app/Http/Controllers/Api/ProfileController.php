<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController as SiteProfileController;
use App\Models\Student;
use App\Models\Company;
use App\Models\User;
use \App\Models\Institution;
use App\Models\ValidationRequest;
use App\Models\StudentStudy;
use App\Models\StudentLanguage;
use Auth;
use Illuminate\Support\MessageBag;
use Validator;
use Image;

class ProfileController extends SiteProfileController
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => array('index')]);
    }

    public function getInstitutions()
    {
        return User::where('is_filled', 1)->where('userable_type', Institution::class)->select('name')->get();
    }

    public function getOwnProfile(Request $request)
    {
        $this->getUserProfile($request, Auth::user()->id);
    }

    public function getUserProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $public = Auth::user() == null;
        if (!Auth::user() || Auth::user()->id != $id) {
            if (!$user->is_filled || !$user->visible || $user->banned) {
                return response()->json(['error' => 'not_found'], 404);
            }
        }
        if ($user->isA('student')) {
            $user->userable->load('languages', 'experiences', 'training', 'studies');
            if ($user->userable->valid == 'validated') {
                if ($user->userable->validationRequest && $user->userable->validationRequest->validator) {
                    $user->validator = $user->userable->validationRequest->validator->load('user');
                }
            }

            $studyLevels = array();
            $studyFields = array();
            $languageLevels = array();
            $languages = array();

            foreach (StudentStudy::$fields as $item) {
                $studyFields[$item] = trans('reg-profile.'.$item);
            }
            foreach (StudentStudy::$levels as $item) {
                $studyLevels[$item] = trans('reg-profile.'.$item);
            }
            foreach (StudentLanguage::$levels as $item) {
                $languageLevels[$item] = trans('reg-profile.'.$item);
            }

            foreach (StudentLanguage::$languages as $key => $item) {
                $languages[$key] = $item['name'];
            }

            foreach ($user->userable->studies as $study) {
                $study->field =  $studyFields[$study->field];
                $study->level =  $studyLevels[$study->level];
            }

            foreach ($user->userable->languages as $language) {
                $language->name =  $languages[$language->name];
                $language->level =  $languageLevels[$language->level];
            }
        }

        if ($user->isA('company')) {
            $user->userable->load('personalSkills');
            $user->alertable = $user->userable->isAlertableBy(Auth::user());
        }

        if ($user->isA('validator')) {
            $user->userable->load('institution.user');
            $students = array();
            foreach ($user->userable->validationRequest as $request) {
                if ($request->student->valid == "validated") {
                    $s = Student::find($request->student->id);
                    $students[] = array('name' => $s->user->fullName, 'id' => $s->user->id);
                }
            }
            $user->students = $students;
        }

        return $user;
    }

    public function update(Request $request)
    {
        $user = Auth::User();
        $errors = parent::processUser($request, $user);

        if ($request->has('validate')) {
            return $errors;
        }
        return array('user' => $user, 'errors' => $errors);
    }

    public function inviteSchool(Request $request, $validate = false)
    {
        return parent::inviteSchool($request, true);
    }
}
