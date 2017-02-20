<?php

namespace App\Http\Controllers;

use Auth;
use \App\Models\User;
use \App\Models\Student;
use \App\Models\Institution;
use \App\Models\Company;
use \App\Models\Alert;

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
        $data = array(
            'cities' => User::getCityCoordinates()->toJSON(),
            'alerts' => Alert::getCount(),
            'studentsCount' => User::getCount(Student::class),
            'companiesCount' => User::getCount(Company::class),
            'institutionsCount' => User::getCount(Institution::class),
            'recentStudents' => Student::getRecent(),
            'companies' => Company::getRandom(),
            'institutions' => Institution::getRandom(),
            'talentQuote' => Company::getRandomTalent()
        );
        $data['totalUserCount'] = $data['studentsCount'] + $data['companiesCount'] + $data['institutionsCount'];

        return view('static.landing', $data);
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
