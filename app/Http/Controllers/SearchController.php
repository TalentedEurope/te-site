<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('company')) {
            return view('search.companies');
        }

        return view('search.students');
    }
}
