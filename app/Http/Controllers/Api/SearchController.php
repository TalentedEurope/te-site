<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api;
use App\Http\Controllers;
use App\Http\Controllers\SearchController as SiteSearchController;
use App\Models\Company;
use App\Models\User;
use App\Models\Student;
use App\Models\StudentStudy;
use App\Models\StudentLanguage;
use App\Http\Requests;
use JWTAuth;

class SearchController extends SiteSearchController
{
    public function getStudents(Request $request)
    {
        $student = array(
            'full_name' => 'John Doe',
            'lives_in' => 'Spain',
            'studied' => 'Doctorate in Lorem ipsum dolor sit amet Consectetuor',
            'studied_in' => 'IES Puerto de la Cruz Telesforo Bravo',
            'skills' => [
                array('name' => 'Lorem ipsum', 'important' => true),
                array('name' => 'Dolor sit amet', 'important' => false),
                array('name' => 'Consectetur adipiscing elit', 'important' => false),
            ],
            'languages' => ['Spanish', 'English', 'French'],
            'photo' => 'http://placekitten.com/g/150/150',
            'validated' => true,
        );

        return [$student, $student, $student, $student];
    }

    public function getCompanies(Request $request)
    {
        $company = array(
            'name' => 'John Doe LLC.',
            'info' => 'Company Sector',
            'we_are_in' => 'Santa Cruz de Tenerife, Spain.',
            'talent_is' => 'Jelly apple pie icing. Jelly cupcake tiramisu jelly beans marzipan. Cheesecake jelly-o jelly tootsie roll biscuit chocolate macaroon marshmallow. Jelly-o marshmallow tart donut brownie chocolate topping chocolate cake.',
            'skills' => [
                array('name' => 'Lorem ipsum'),
                array('name' => 'Dolor sit amet'),
                array('name' => 'Consectetur adipiscing elit'),
            ],
            'photo' => 'http://placebear.com/g/150/150',
        );

        return [$company, $company, $company, $company];
    }

    public function getStudentFilters(Request $request)
    {
        $data = array();
        $studyLevels = array();
        $studyFields = array();
        $languages = array();
        $countries = array();

        $availableStudyLevels = StudentStudy::join('students', 'students.id', '=', 'student_studies.student_id')->whereIn('students.id', function ($q) {
                $q->from('users')
                    ->select('userable_id')
                    ->where('visible', true)
                    ->where('is_filled', true)
                    ->where('banned', false)
                    ->where('userable_type', Student::class);
        })->select('student_studies.level')->groupBy('student_studies.level')->get();

        $availableStudyFields = StudentStudy::join('students', 'students.id', '=', 'student_studies.student_id')->whereIn('students.id', function ($q) {
                $q->from('users')
                    ->select('userable_id')
                    ->where('visible', true)
                    ->where('is_filled', true)
                    ->where('banned', false)
                    ->where('userable_type', Student::class);
        })->select('student_studies.field')
          ->whereNotNull('student_studies.field')
          ->groupBy('student_studies.field')
          ->get();

        $availableStudyLanguages = StudentLanguage::join('students', 'students.id', '=', 'student_languages.student_id')->whereIn('students.id', function ($q) {
                $q->from('users')
                    ->select('userable_id')
                    ->where('visible', true)
                    ->where('is_filled', true)
                    ->where('banned', false)
                    ->where('userable_type', Student::class);
        })->select('student_languages.level')
          ->groupBy('student_languages.level')
          ->whereNotNull('student_languages.level')
          ->get();

        $availableCountries = User::where('userable_type', Student::class)
                                        ->select("country")
                                        ->whereNotNull('country')
                                        ->groupBy('country')
                                        ->get();

        foreach ($availableStudyLevels as $study) {
            $studyLevels[] = array(
                'code' => $study->level,
                'name' => trans('reg-profile.'.$study->level)
            );
        }

        foreach ($availableStudyFields as $study) {
            $studyFields[] = array(
                'code' => $study->field,
                'name' => trans('reg-profile.'.$study->field)
            );
        }

        foreach ($availableStudyLanguages as $language) {
            $languages[] = array(
                'code' => $language->level,
                'name' => trans('reg-profile.'.$language->level)
            );
        }


        foreach ($availableCountries as $country) {
            $countries[] = array(
                'code' => $country->country,
                'name' => User::$countries[$country->country]
            );
        }

        $data[] = array(
            'code' => 'level_of_studies',
            'title' => trans('reg-profile.student_study_level'),
            'items' => $studyLevels
        );
        $data[] = array(
            'code' => 'field_of_studies',
            'title' => trans('reg-profile.student_study_field'),
            'items' => $studyFields
        );
        $data[] = array(
            'code' => 'languages',
            'title' => trans('reg-profile.student_languages'),
            'items' => $languages
        );
        $data[] = array(
            'code' => 'countries',
            'title' => trans('reg-profile.country'),
            'items' => $countries
        );
        return $data;
    }

    public function getCompanyFilters(Request $request)
    {
        $data = array();
        $companySectors = array();
        $countries = array();
        $availableSectors = Company::whereNotNull("activity")
                                        ->whereHas('user', function ($q) {
                                            $q->where('visible', true);
                                            $q->where('is_filled', true);
                                            $q->where('banned', false);
                                        })
                                        ->select("activity")
                                        ->groupBy('activity')
                                        ->get();
        $availableCountries = User::where('userable_type', Company::class)
                                        ->select("country")
                                        ->groupBy('country')
                                        ->get();
        foreach ($availableSectors as $sector) {
            $companySectors[] = array(
                'code' => $sector->activity,
                'name' => trans('reg-profile.' . $sector->activity)
            );
        }

        foreach ($availableCountries as $country) {
            $countries[] = array(
                'code' => $country->country,
                'name' => User::$countries[$country->country]
            );
        }

        $data[] = array(
            'code' => 'activities',
            'title' => trans('reg-profile.company_activity'),
            'items' => $companySectors
        );

        $data[] = array(
            'code' => 'countries',
            'title' => 'Countries',
            'items' => $countries
        );

        return $data;
    }
}
