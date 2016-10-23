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
use Validator;

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
        $rules = array(
                        'search_text' => 'string|nullable',
                        'activities.*' => 'required|in:'.implode(',', Company::$activities),
                        'countries.*' => 'required|in:'.implode(',', array_keys(User::$countries)),
        );
        $v = Validator::make($request->all(), $rules);
        $results = Company::whereNotNull("activity")
                ->whereHas('user', function ($q) use ($v) {
                    $q->where('visible', true);
                    $q->where('is_filled', true);
                    $q->where('banned', false);
                    if (isset($v->valid()['search_text'])) {
                        $q->search($v->valid()['search_text'], ['name','email']);
                    }
                    if (isset($v->valid()['countries'])) {
                        $q->whereIn('country', $v->valid()['countries']);
                    }
                });
        if (isset($v->valid()['activities'])) {
            $results->whereIn('activity', $v->valid()['activities']);
        }

        $results = $results->get();

        $companies = array();
        foreach ($results as $company) {
            $skills = array();
            foreach ($company->personalSkills as $item) {
                $skills[] = array(
                    'code' => $item->id,
                    'name' => $item->name
                );
            }

            $companies[] = array(
                'name' => $company->user->name,
                'info' => trans('reg-profile.'.$company->activity),
                'country' => User::$countries[$company->user->country],
                'city' => $company->user->city,
                'we_are_in' => $company->user->city . ', ' . User::$countries[$company->user->country],
                'talent_is' => $company->talent,
                'skills' => $skills,
                'photo' => $company->user->image,
            );
        }
        return $companies;
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
