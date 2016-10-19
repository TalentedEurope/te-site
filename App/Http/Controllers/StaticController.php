<?php

namespace App\Http\Controllers;

use Auth;

class StaticController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHome()
    {
        $user = Auth::user();
        if ($user) {
            if ($user->isA('student')) {
                if ($user->is_filled) {
                    return redirect(route('view_profile'));
                } else {
                    return redirect(route('edit_profile'));
                }
            } elseif ($user->isA('company')) {
                return redirect(route('search'));
            }
        }

        return view('static.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCookies()
    {
        return view('static.cookies');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPrivacyPolicy()
    {
        return view('static.privacy_policy');
    }
}
