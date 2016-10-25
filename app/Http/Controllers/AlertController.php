<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Api\LoginController;

class AlertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAlerts(Request $request)
    {
        if (!Auth::user()->isA('company')) {
            App::abort(403, 'Unauthorized action.');
        }
        $data = array('token' => LoginController::userToken());
        return view('company.alerts', $data);
    }

    public function getJSONNudges(Request $request)
    {
        $nudge = array(
            'id' => 1,
            'student' => 'John Doe',
            'country' => 'Spain',
            'study_level' => 'Bachelor’s or equivalent',
            'when_nudged' => '2015-12-08T14:43:38',
            'when_nudged_relative' => 'One year ago',
        );
        $nudge2 = array(
            'id' => 3,
            'student' => 'pepe',
            'country' => 'Spain',
            'study_level' => 'Bachelor’s or equivalent',
            'when_nudged' => '2015-10-03T14:45:38',
            'when_nudged_relative' => 'One day ago'
        );
        return [$nudge, $nudge2, $nudge, $nudge];
    }
}
