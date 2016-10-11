<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NudgeController extends Controller
{
    public function index(Request $request)
    {
        return view('company.nudges');
    }

    public function delete(Request $request, $id)
    {
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
