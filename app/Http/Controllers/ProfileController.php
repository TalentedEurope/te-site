<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('company')) {
            return view('profile.company-view');
        }

        return view('profile.student-view');
    }

    public function edit(Request $request)
    {
        if ($request->has('student')) {
            return view('profile.student-edit');
        }

        if ($request->has('company')) {
            return view('profile.company-edit');
        }

        if ($request->has('institution')) {
            return view('profile.institution-edit');
        }

        if ($request->has('validator')) {
            return view('profile.validator-edit');
        }
    }

    public function update(Request $request, $id)
    {
    }
}
