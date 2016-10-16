<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FilterController extends Controller
{
    public function getJSONStudentsFilters(Request $request)
    {
        $level_of_studies = array(
            'code' => 'level_of_studies',
            'title' => 'Level Of Studies',
            'items' => array(
                array('code' => '1', 'name' => 'Study level 1'),
                array('code' => '2', 'name' => 'Study level 2'),
                array('code' => '3', 'name' => 'Study level 3')
            )
        );
        $field_of_studies = array(
            'code' => 'field_of_studies',
            'title' => 'Field Of Studies',
            'items' => array(
                array('code' => '1', 'name' => 'Field of studies 1'),
                array('code' => '2', 'name' => 'Field of studies 2'),
                array('code' => '3', 'name' => 'Field of studies 3')
            )
        );
        $languages = array(
            'code' => 'languages',
            'title' => 'Languages',
            'items' => array(
                array('code' => 'spanish', 'name' => 'Spanish'),
                array('code' => 'english', 'name' => 'English'),
                array('code' => 'french', 'name' => 'French'),
                array('code' => 'italian', 'name' => 'Italian'),
                array('code' => 'slovak', 'name' => 'Slovak')
            )
        );
        $countries = array(
            'code' => 'countries',
            'title' => 'Countries',
            'items' => array(
                array('code' => 'spain', 'name' => 'Spain'),
                array('code' => 'united_kingdom', 'name' => 'United Kingdom'),
                array('code' => 'france', 'name' => 'France'),
                array('code' => 'italy', 'name' => 'Italy'),
                array('code' => 'slovenia', 'name' => 'Slovenia')
            )
        );

        return [$level_of_studies, $field_of_studies, $languages, $countries];
    }

    public function getJSONCompaniesFilters(Request $request)
    {
        $activities = array(
            'code' => 'activities',
            'title' => 'Activities',
            'items' => array(
                array('code' => '1', 'name' => 'Activity 1'),
                array('code' => '2', 'name' => 'Activity 2'),
                array('code' => '3', 'name' => 'Activity 3')
            )
        );
        $countries = array(
            'code' => 'countries',
            'title' => 'Countries',
            'items' => array(
                array('code' => 'spain', 'name' => 'Spain'),
                array('code' => 'united_kingdom', 'name' => 'United Kingdom'),
                array('code' => 'france', 'name' => 'France'),
                array('code' => 'italy', 'name' => 'Italy'),
                array('code' => 'slovenia', 'name' => 'Slovenia')
            )
        );

        return [$activities, $countries];
    }
}
