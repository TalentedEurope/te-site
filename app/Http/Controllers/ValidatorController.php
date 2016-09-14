<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidatorController extends Controller
{
    public function index(Request $request)
    {
        return view('institution.validators');
    }

    public function toggle(Request $request, $id)
    {
    }
}
