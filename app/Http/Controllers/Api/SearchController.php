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
        $rules = array(
                        'search_text' => 'string|nullable',
                        'level_of_studies.*' => 'required|in:'.implode(',', StudentStudy::$levels),
                        'field_of_studies.*' => 'required|in:'.implode(',', StudentStudy::$fields),
                        'languages.*' => 'required|in:'.implode(',', array_keys(StudentLanguage::$languages)),
                        'countries.*' => 'required|in:'.implode(',', array_keys(User::$countries)),
        );

        $v = Validator::make($request->all(), $rules);
        $results = Student::whereHas('user', function ($q) use ($v) {
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


        if (isset($v->valid()['level_of_studies']) ||
                isset($v->valid()['field_of_studies'])) {
            $results->whereHas('studies', function ($q) use ($v) {

                if (isset($v->valid()['level_of_studies'])) {
                    $q->whereIn('level', $v->valid()['level_of_studies']);
                }

                if (isset($v->valid()['field_of_studies'])) {
                    $q->whereIn('field', $v->valid()['field_of_studies']);
                }
            });
        }

        if (isset($v->valid()['languages'])) {
            $results->whereHas('languages', function ($q) use ($v) {
                $q->whereIn('name', $v->valid()['languages']);
            });
        }

        if (isset($v->valid()['activities'])) {
            $results->whereIn('activity', $v->valid()['activities']);
        }

        $results = $results->paginate(env('PAGINATE_ENTRIES', 10));

        $students = array();
        foreach ($results as $student) {
            $skills = array();
            $languages = array();
            $firstStudy = $student->studies->first();
            $firstStudyName = "";
            $firstStudyLevel = "";
            $firstStudyInstitution = "";
            if ($firstStudy) {
                $firstStudyName = $firstStudy->name;
                $firstStudyLevel = trans('reg-profile.' . $firstStudy->level);
                $firstStudyInstitution = $firstStudy->institution_name;
            }

            foreach ($student->personalSkills as $item) {
                $skills[] = array(
                    'id' => $item->id,
                    'name' => $item->name,
                    'important' => false
                );
            }

            foreach ($student->professionalSkills as $item) {
                $skills[] = array(
                    'id' => $item->id,
                    'name' => $item->name,
                    'important' => false
                );
            }

            foreach ($student->languages as $item) {
                if ($item->name) {
                    $languages[] = StudentLanguage::$languages[$item->name]['name'];
                }
            }

            $students[] = array(
                'id' => $student->user->id,
                'slug' => $student->user->slug,
                'full_name' => $student->user->name . " " . $student->user->surname,
                'name' => $student->user->name,
                'surname' => $student->user->surname,
                'lives_in' => $student->user->city . ', ' . User::$countries[$student->user->country],
                'country' => User::$countries[$student->user->country],
                'city' => $student->user->city,
                'info' => trans('reg-profile.'.$student->activity),
                'skills' => $skills,
                'photo' => asset(User::$photoPath.$student->user->image),
                'validated' => $student->valid,
                'first_study_name' => $firstStudyName,
                'first_study_level' => $firstStudyLevel,
                'first_study_institution' => $firstStudyInstitution,
                'studied' => $firstStudyInstitution . ' at ' . $firstStudyName,
                'studied_in' => $firstStudyInstitution,
                'languages' => $languages,
            );
        }

        return array(
            'data' => $students,
            'per_page' => $results->perPage(),
            'total' => $results->total(),
            'current_page' => $results->currentPage(),
            'prev_page_url' => $results->previousPageUrl(),
            'next_page_url' => $results->nextPageUrl(),
        );
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

        $results = $results->paginate(env('PAGINATE_ENTRIES', 10));

        $companies = array();
        foreach ($results as $company) {
            $skills = array();
            foreach ($company->personalSkills as $item) {
                $skills[] = array(
                    'id' => $item->id,
                    'name' => $item->name
                );
            }

            $companies[] = array(
                'id' => $company->user->id,
                'slug' => $company->user->slug,
                'name' => $company->user->name,
                'info' => trans('reg-profile.'.$company->activity),
                'country' => User::$countries[$company->user->country],
                'city' => $company->user->city,
                'we_are_in' => $company->user->city . ', ' . User::$countries[$company->user->country],
                'talent_is' => $company->talent,
                'skills' => $skills,
                'photo' => asset(User::$photoPath.$company->user->image),
            );
        }
        return array(
            'data' => $companies,
            'per_page' => $results->perPage(),
            'total' => $results->total(),
            'current_page' => $results->currentPage(),
            'prev_page_url' => $results->previousPageUrl(),
            'next_page_url' => $results->nextPageUrl(),
        );
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
                'id' => $study->level,
                'name' => trans('reg-profile.'.$study->level)
            );
        }

        foreach ($availableStudyFields as $study) {
            $studyFields[] = array(
                'id' => $study->field,
                'name' => trans('reg-profile.'.$study->field)
            );
        }

        foreach ($availableStudyLanguages as $language) {
            $languages[] = array(
                'id' => $language->level,
                'name' => trans('reg-profile.'.$language->level)
            );
        }


        foreach ($availableCountries as $country) {
            $countries[] = array(
                'id' => $country->country,
                'name' => User::$countries[$country->country]
            );
        }

        $data[] = array(
            'id' => 'level_of_studies',
            'title' => trans('reg-profile.student_study_level'),
            'items' => $studyLevels
        );
        $data[] = array(
            'id' => 'field_of_studies',
            'title' => trans('reg-profile.student_study_field'),
            'items' => $studyFields
        );
        $data[] = array(
            'id' => 'languages',
            'title' => trans('reg-profile.student_languages'),
            'items' => $languages
        );
        $data[] = array(
            'id' => 'countries',
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
                'id' => $sector->activity,
                'name' => trans('reg-profile.' . $sector->activity)
            );
        }

        foreach ($availableCountries as $country) {
            $countries[] = array(
                'id' => $country->country,
                'name' => User::$countries[$country->country]
            );
        }

        $data[] = array(
            'id' => 'activities',
            'title' => trans('reg-profile.company_activity'),
            'items' => $companySectors
        );

        $data[] = array(
            'id' => 'countries',
            'title' => 'Countries',
            'items' => $countries
        );

        return $data;
    }
}
