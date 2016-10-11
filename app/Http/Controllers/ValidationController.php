<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function index(Request $request)
    {
        return view('validator.students');
    }

    public function getJSONStudentsValidation(Request $request)
    {
        return array(
            array(
                'id' => 1,
                'full_name' => 'John Doe',
                'date_of_request' => 'Two days ago',
                'status' => 'Pending'
            ),
            array(
                'id' => 2,
                'full_name' => 'John Doe',
                'date_of_request' => 'Two days ago',
                'status' => 'Validated'
            ),
            array(
                'id' => 3,
                'full_name' => 'John Doe',
                'date_of_request' => 'Two days ago',
                'status' => 'Not validated'
            )
        );
    }
}
