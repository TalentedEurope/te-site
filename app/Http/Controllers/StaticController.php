<?php

namespace App\Http\Controllers;

use Auth;
use \App\Models\User;
use \App\Models\Student;
use \App\Models\Institution;
use \App\Models\Company;
use \App\Models\Alert;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }


    /**
     * Show the landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLanding()
    {
        $companies = Company::getRandom();
        $institutions = Institution::getRandom();
        $logos = $companies->merge($institutions)->shuffle();

        $data = array(
            'cities' => User::getCityCoordinates()->toJSON(),
            'alerts' => Alert::getCount(),
            'logos' => $logos,
            'studentsCount' => User::getCount(Student::class),
            'companiesCount' => User::getCount(Company::class),
            'institutionsCount' => User::getCount(Institution::class),
            'recentStudents' => Student::getRecent(),
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


    public function getFaq()
    {
        return view('static.faq');
    }

    public function getGdpr() 
    {
        return view("gdpr", array('user' => Auth::User()));
    }
    
    public function postGdpr(Request $request) {
        if ($request->input('download')) {
            $json = Auth::user()->toJson();
            return response($json, 200)
                ->header('Content-disposition', 'attachment; filename=data.txt')
                ->header('Content-type','application/json');
        }


        $validator = \Validator::make($request->all(), [
            'notify_me' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
    
        $user = Auth::user();
        $user->notify_me = $request->input('notify_me');
        $user->save();
        return view("gdpr", array('thanks' => true ));
    }

}
