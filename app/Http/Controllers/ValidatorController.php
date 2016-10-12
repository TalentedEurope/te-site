<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidatorController extends Controller
{
    public function index(Request $request)
    {
        return view('institution.validators');
    }

    public function getJSONValidators(Request $request)
    {
        return array(
            array(
                'id' => 1,
                'full_name' => 'John Doe',
                'email' => 'johndoe@gmail.com',
                'department' => 'Information Technology',
                'position' => 'Teacher',
                'active' => false
            ),
            array(
                'id' => 2,
                'full_name' => 'John Doe',
                'email' => 'johndoe@gmail.com',
                'department' => 'Information Technology',
                'position' => 'Teacher',
                'active' => true
            ),
            array(
                'id' => 3,
                'full_name' => 'John Doe',
                'email' => 'johndoe@gmail.com',
                'department' => 'Information Technology',
                'position' => 'Teacher',
                'active' => true
            )
        );
    }

    public function toggleStatus(Request $request, $id)
    {
        return array();
    }
}
