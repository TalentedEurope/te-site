<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()) {
            if ($user->isA('student')) {
                return $this->showSearch($request, 'companies');
            }
        } else {
            return $this->showSearch($request, 'companies');
        }

        return $this->showSearch($request, 'students');
    }

    public function searchStudents(Request $request)
    {
        return $this->showSearch($request, 'students');
    }

    public function searchCompanies(Request $request)
    {
        return $this->showSearch($request, 'companies');
    }

    public function showSearch(Request $request, $type)
    {
        $token = '';
        if (Auth::user()) {
            $token = JWTAuth::fromUser(Auth::user());
        }
        $data = array(
            'token' => $token,
            'type' => $type,
        );

        return view('search.results', $data);
    }
}
