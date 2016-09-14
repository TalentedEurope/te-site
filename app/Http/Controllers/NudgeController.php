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
}
