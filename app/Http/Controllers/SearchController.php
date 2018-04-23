<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
use App\Models\Institution;
use Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user) {
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

    public function searchInstitutions(Request $request)
    {
        $data = array(
            'institutions' => User::where('is_filled', true)->where('visible', true)->where('userable_type', Institution::class)->orderBy('name')->get()
        );
        return view('search.institutions', $data);
    }

    public function showSearch(Request $request, $type)
    {
        $token = '';
        $user = Auth::user();
        $data = array(
            'token' => '',
            'type' => $type,
            'userType' => '',
        );
        if ($user) {
            $data['token'] = JWTAuth::fromUser(Auth::user());
            if ($user->isA('student')) {
                $data['userType'] = 'student';
            }
            if ($user->isA('company')) {
                $data['userType'] = 'company';
            }
            if ($user->isA('validator')) {
                $data['userType'] = 'validator';
            }
            if ($user->isA('institution')) {
                $data['userType'] = 'institution';
            }
            $token = JWTAuth::fromUser(Auth::user());
        }
        return view('search.results', $data);
    }
}
