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
            return redirect(route('view_profile'));
        }

        return view('static.home');
    }

    /**
     * Show the landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLanding()
    {
        $user = Auth::user();
        if ($user) {
            return redirect(route('view_profile'));
        }

        return view('static.landing');
    }

    /**
     * Show the cookies page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCookies()
    {
        return view('static.cookies');
    }

    /**
     * Show the privacy policy.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPrivacyPolicy()
    {
        return view('static.privacy_policy');
    }

    public function getTerms()
    {
        return view('static.terms');
    }
}
