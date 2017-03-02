<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController as SiteProfileController;
use App\Models\Student;
use App\Models\Company;
use App\Models\User;
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
