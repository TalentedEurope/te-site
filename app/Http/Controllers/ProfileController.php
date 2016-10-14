<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => array('index')]);
    }

    public function index(Request $request)
    {
        if ($request->has('company')) {
            return view('profile.company-view');
        }
        if ($request->has('validator')) {
            return view('profile.validator-view');
        }

        return view('profile.student-view');
    }

    public function get_edit(Request $request)
    {
        $user = Auth::user();
        if ($user->isA('student')) {
            return view('profile.student-edit');
        }

        if ($user->isA('company')) {
            return view('profile.company-edit');
        }

        if ($user->isA('institution')) {
            return view('profile.institution-edit');
        }

        if ($user->isA('validator')) {
            return view('profile.validator-edit');
        }
    }

    public function getJSONStudentProfile(Request $request)
    {
        return array(
            'id' => 1,
            'full_name' => 'John Doe',
            'studied' => 'Doctorate in Lorem ipsum dolor sit amet Consectetuor',
            'lives_in' => 'Puerto de la Cruz, Spain',
            'nationality' => 'United Kingdom',
            'studied_in' => 'IES Puerto de la Cruz Telesforo Bravo',
            'born_on' => '17 september 1993',
            'my_talent' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut arcu sed odio vestibulum rhoncus et vel est. Ut id odio eu lorem iaculis posuere quis a elit. Nunc dictum placerat eros, eget pulvinar felis tristique eget. Curabitur fermentum purus vel lorem blandit fringilla. Mauris',
            'skills' => array(
                array('name' => 'Lorem ipsum', 'important' => true),
                array('name' => 'Dolor sit amet', 'important' => false),
                array('name' => 'Consectetur adipiscing elit', 'important' => false),
            ),
            'languages' => array('Spanish', 'English', 'French'),
            'photo' => 'http://placekitten.com/g/150/150',
            'validated' => true,
            'email' => 'john@doe.com',
            'phone' => '317-456-2564',
            'address' => '32 Reading rd, Birmingham B26 3QJ, United Kingdom',
            'twitter' => 'http://twitter.com',
        );
    }

    public function getJSONCompanyProfile(Request $request)
    {
        return array(
            'id' => 1,
            'name' => 'John Doe',
            'sector' => 'Company sector',
            'we_are_in' => 'Santa Cruz de Tenerife, Spain.',
            'talent_is' => 'Jelly apple pie icing. Jelly cupcake tiramisu jelly beans marzipan. Cheesecake jelly-o jelly tootsie roll biscuit chocolate macaroon marshmallow. Jelly-o marshmallow tart donut brownie chocolate topping chocolate cake.',
            'skills' => array(
                array('name' => 'Lorem ipsum'),
                array('name' => 'Dolor sit amet'),
                array('name' => 'Consectetur adipiscing elit'),
            ),
            'photo' => 'http://placebear.com/g/150/150',
            'email' => 'john@doe.com',
            'phone' => '317-456-2564',
            'address' => '32 Reading rd, Birmingham B26 3QJ, United Kingdom',
            'twitter' => 'http://twitter.com',
        );
    }

    public function getJSONValidatorProfile(Request $request)
    {
        return array(
            'id' => 1,
            'full_name' => 'John Doe',
            'institution_name' => 'Institution name',
            'validated_students' => array(
                array('full_name' => 'Lorem ipsum dolor sit amet'),
                array('full_name' => 'Lorem ipsum dolor sit amet'),
                array('full_name' => 'Lorem ipsum dolor sit amet'),
                array('full_name' => 'Lorem ipsum dolor sit amet'),
            ),
        );
    }

    public function update(Request $request, $id)
    {
    }
}
