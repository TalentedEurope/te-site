<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => array('index')]);
    }

    public function index(Request $request)
    {
        if ($request->has('company')) {
            return view('profile.company-view');
        }
        if ($request->has('validator')) {
            return view('profile.validator-view');
        }

        return view('profile.student-view');
    }

    public function get_edit(Request $request)
    {
        $user = Auth::user();
        if ($user->isA('student')) {
            return view('profile.student-edit');
        }

        if ($user->isA('company')) {
            return view('profile.company-edit');
        }

        if ($user->isA('institution')) {
            return view('profile.institution-edit');
        }

        if ($user->isA('validator')) {
            return view('profile.validator-edit');
        }
    }
}
