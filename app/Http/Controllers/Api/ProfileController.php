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

    public function getUserProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $public = Auth::user() == null;
        if (!$user->is_filled || !$user->visible || $user->banned) {
            return response()->json(['error' => 'not_found'], 404);
        }
        if ($user->isA('student')) {
            if ($user->userable->valid == 'validated') {
                if ($user->userable->validationRequest && $user->userable->validationRequest->validator) {
                    $user->validator = $user->userable->validationRequest->validator->load('user');
                }
            }
            foreach ($user->userable->languages as $lang) {
                $lang->name = StudentLanguage::$languages[$lang->name]['name'];
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
                    $students[] = array('name' => $request->student->user->fullName, 'id' => $request->student->user->id);
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
