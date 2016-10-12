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

    public function getJSONStudentsResults(Request $request)
    {
        $student = array(
            'full_name' => 'John Doe',
            'lives_in' => 'Spain',
            'studied' => 'Doctorate in Lorem ipsum dolor sit amet Consectetuor',
            'studied_in' => 'IES Puerto de la Cruz Telesforo Bravo',
            'skills' => [
                array('name' => 'Lorem ipsum', 'important' => true),
                array('name' => 'Dolor sit amet', 'important' => false),
                array('name' => 'Consectetur adipiscing elit', 'important' => false)
            ],
            'languages' => ['Spanish', 'English', 'French'],
            'photo' => 'http://placekitten.com/g/150/150',
            'validated' => true
        );
        return [$student, $student, $student, $student];
    }

    public function getJSONCompaniesResults(Request $request)
    {
        $company = array(
            'name' => 'John Doe LLC.',
            'info' => 'Company Sector',
            'we_are_in' => 'Santa Cruz de Tenerife, Spain.',
            'talent_is' => 'Jelly apple pie icing. Jelly cupcake tiramisu jelly beans marzipan. Cheesecake jelly-o jelly tootsie roll biscuit chocolate macaroon marshmallow. Jelly-o marshmallow tart donut brownie chocolate topping chocolate cake.',
            'skills' => [
                array('name' => 'Lorem ipsum'),
                array('name' => 'Dolor sit amet'),
                array('name' => 'Consectetur adipiscing elit')
            ],
            'photo' => 'http://placebear.com/g/150/150',
        );
        return [$company, $company, $company, $company];
    }
}
