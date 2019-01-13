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
use App\Models\CompanyKeyword;
use App\Models\StudentTraining;
use App\Models\StudyKeyword;
use App\Models\Institution;
use App\Models\Alert;
use App\Models\ProfessionalSkill;
use App\Http\Requests;
use JWTAuth;
use config;
use Validator;
use DB;
use Auth;
use Carbon\Carbon;

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

        $searchKeyword = array();

        $results = Student::whereHas('user', function ($q) use ($v) {
                        $q->where('visible', true);
                        $q->where('is_filled', true);
                        $q->where('banned', false);
            if (isset($v->valid()['countries'])) {
                $q->whereIn('country', $v->valid()['countries']);
            }
        });

        if (isset($v->valid()['level_of_studies']) ||
                isset($v->valid()['field_of_studies'])
                ) {
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
            foreach ($v->valid()['languages'] as $lang) {
                $results->whereHas('languages', function ($q) use ($v, $lang) {
                    $q->where('name', $lang);
                });
            }

        }

        if (isset($v->valid()['activities'])) {
            $results->whereIn('activity', $v->valid()['activities']);
        }


        // Lets take a look at the text query
        $userIds = array();
        if (isset($v->valid()['search_text'])) {
            // Users that match the search query on name surname or email
            $ids = User::search($v->valid()['search_text'], ['name', 'surname', 'email'])->where('userable_type', Student::class)->select('id')->get()->pluck('id')->toArray();
            $userIds = array_merge($userIds, $ids);

            $sk = ProfessionalSkill::with('students', 'students.user')->search($v->valid()['search_text'], ['name'])->get();
            if (sizeof($sk)) {
                foreach ($sk as $skill) {
                    foreach ($skill->students as $st) {
                        if ($st->user) {
                            $userIds[] = $st->user->id;
                        }
                    }
                }
            }

            // Let's check out student studies
            $stsy = StudentStudy::with('student', 'student.user')->search($v->valid()['search_text'], ['name'])->get();
            if (sizeof($stsy)) {
                foreach ($stsy as $study) {
                    if ($study->student->user) {
                        if ($study->student) {
                            $userIds[] = $study->student->user->id;
                        }
                    }
                }
            }

            // Let's check out student studies
            $stsg = StudentTraining::with('student', 'student.user')->search($v->valid()['search_text'], ['name'])->get();
            if (sizeof($stsg)) {
                foreach ($stsg as $training) {
                    if ($training->student && $training->student->user) {
                        $userIds[] = $training->student->user->id;
                    }
                }
            }

            // Lets look at the student studies related keywords
            // It breaks with more than 4 columns so we split it in two
            $ids = StudyKeyword::search($v->valid()['search_text'], ['en','es','it'])->join('student_studies', 'student_studies.field', 'key')->join('users', 'users.userable_id', 'student_studies.student_id')->where('userable_type', Student::class)->select('users.id')->get()->pluck('id')->toArray();
            $userIds = array_merge($userIds, $ids);

            $ids = StudyKeyword::search($v->valid()['search_text'], ['de','fr','sk'])->join('student_studies', 'student_studies.field', 'key')->join('users', 'users.userable_id', 'student_studies.student_id')->where('userable_type', Student::class)->select('users.id')->get()->pluck('id')->toArray();
            $userIds = array_merge($userIds, $ids);

            $filterStudents = User::where('userable_type', Student::class)->whereIn('id', $userIds)->select('userable_id')->get()->pluck('userable_id')->toArray();

            $results->whereIn('id', $filterStudents);
        }

        $results->orderBy(DB::raw("FIELD(valid, 'validated','pending','denied')"));
        $results->orderBy('created_at', 'desc');
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
            $skillIds = array();
            $important = array();
            foreach ($student->personalSkills as $item) {
                if (in_array($item->id, $skillIds)) {
                    $important[] = $item->id;
                    continue;
                }
                $skillIds[] = $item->id;

                $skills[] = array(
                    'id' => $item->id,
                    'name' => $item->name,
                    'important' => false
                );
            }
            for ($i = 0; $i < sizeOf($skills); $i++) {
                if (in_array($skills[$i]['id'], $important)) {
                    $skills[$i]['important'] = true;
                }
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

            $studentCountry = "";
            if (isset(User::$countries[$student->user->country])) {
                $studentCountry = trans('global.'.$student->user->country);
            }

            $students[] = array(
                'id' => $student->user->id,
                'slug' => $student->user->slug,
                'full_name' => $student->user->name . " " . $student->user->surname,
                'name' => $student->user->name,
                'surname' => $student->user->surname,
                'lives_in' => $student->user->city . ', ' . $studentCountry,
                'country' => $studentCountry,
                'city' => $student->user->city,
                'info' => trans('reg-profile.'.$student->activity),
                'skills' => $skills,
                'photo' => asset(User::$photoPath.$student->user->image),
                'validated' => $student->valid,
                'first_study_name' => $firstStudyName,
                'first_study_level' => $firstStudyLevel,
                'first_study_institution' => $firstStudyInstitution,
                'studied' => $firstStudyName . ' ' . trans('reg-profile.at') . ' ' . $firstStudyInstitution,
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
        $user = Auth::user();
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
                    if (isset($v->valid()['countries'])) {
                        $q->whereIn('country', $v->valid()['countries']);
                    }
                });
        if (isset($v->valid()['activities'])) {
            $results->whereIn('activity', $v->valid()['activities']);
        }

        if ($request->has("job_offers")) {
            $offerOptions = $request->input("job_offers");
            if (in_array("has-offers", $offerOptions)) {
                $results->whereHas('joboffers');
            }
            if (in_array("has-job-portal", $offerOptions)) {
                $results->where('job_offers_url', "!=", "");
            }

        }

        // Lets take a look at the text query
        $userIds = array();
        if (isset($v->valid()['search_text'])) {
            // Users that match the search query on name surname or email
            $ids = User::search($v->valid()['search_text'], ['name', 'surname', 'email'])->where('userable_type', Company::class)->select('id')->get()->pluck('id')->toArray();
            $userIds = array_merge($userIds, $ids);

            // Lets look at the student studies related keywords
            // It breaks with more than 4 columns so we split it in two
            $ids = CompanyKeyword::search($v->valid()['search_text'], ['en','es','it'])->join('companies', 'companies.activity', 'key')->join('users', 'users.userable_id', 'companies.id')->where('userable_type', Company::class)->select('users.id')->get()->pluck('id')->toArray();

            $userIds = array_merge($userIds, $ids);

            // Lets look at the student studies related keywords
            // It breaks with more than 4 columns so we split it in two
            $ids = CompanyKeyword::search($v->valid()['search_text'], ['de','fr','sk'])->join('companies', 'companies.activity', 'key')->join('users', 'users.userable_id', 'companies.id')->where('userable_type', Company::class)->select('users.id')->get()->pluck('id')->toArray();

            $userIds = array_merge($userIds, $ids);

            $filterCompanies = User::where('userable_type', Company::class)->whereIn('id', $userIds)->select('userable_id')->get()->pluck('userable_id')->toArray();

            $results->whereIn('id', $filterCompanies);
        }

        $results = $results->paginate(env('PAGINATE_ENTRIES', 10));

        $alerts = array();
        $maxAlerts = 0;
        if ($user && $user->isA('student')) {
            $alerts = array_flatten(Alert::where('origin_id', $user->id)->whereDate('created_at', '>', Carbon::now()->subDays(env("MIN_ALERT_DAYS", 1)))->select('target_id')->get()->toArray());

            $maxAlerts = env('MAX_ALERTS', 3) - Alert::where("origin_id", $user->id)->whereDate('created_at', Carbon::today())->count();
        }



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
                'country' => trans('global.'.$company->user->country),
                'city' => $company->user->city,
                'we_are_in' => $company->user->city . ', ' . trans('global.'.$company->user->country),
                'talent_is' => $company->talent,
                'skills' => $skills,
                'photo' => asset(User::$photoPath.$company->user->image),
                'facebook' => $company->user->facebook,
                'twitter' => $company->user->twitter,
                'linkedin' => $company->user->linkedin,
                'description' => $company->description,
                'website' => $company->website,
                'job_offers' => sizeof($company->jobOffers),
                'job_offers_url' => $company->job_offers_url,
                'alertable' => !in_array($company->user->id, $alerts) && $maxAlerts,
            );
        }
        return array(
            'data' => $companies,
            'remaining_alerts' => $maxAlerts,
            'per_page' => $results->perPage(),
            'total' => $results->total(),
            'current_page' => $results->currentPage(),
            'prev_page_url' => $results->previousPageUrl(),
            'next_page_url' => $results->nextPageUrl(),
        );
    }

    public function getInstitutions(Request $request)
    {
        $user = Auth::user();
        $rules = array(
                        'search_text' => 'string|nullable',
        );
        $v = Validator::make($request->all(), $rules);

        $results = Institution::whereHas('user', function ($q) use ($v) {
                    $q->where('visible', true);
                    $q->where('is_filled', true);
                    $q->where('banned', false);
        });

        // Lets take a look at the text query
        $userIds = array();
        if (isset($v->valid()['search_text'])) {
            // Users that match the search query on name surname or email
            $userIds = User::search($v->valid()['search_text'], ['name', 'surname', 'email'])->where('userable_type', Institution::class)->select('id')->get()->pluck('id')->toArray();
            $filterInstitutions = User::where('userable_type', Institution::class)->whereIn('id', $userIds)->select('userable_id')->get()->pluck('userable_id')->toArray();

            $results->whereIn('id', $filterInstitutions);
        }

        $results = $results->paginate(env('PAGINATE_ENTRIES', 10));

        $alerts = array();
        $maxAlerts = 0;

        $institutions = array();
        foreach ($results as $institution) {
            $institutions[] = array(
                'id' => $institution->user->id,
                'slug' => $institution->user->slug,
                'name' => $institution->user->name,
                'type' => trans('reg-profile.institution_'.strtolower($institution->type)),
                'country' => trans('global.'.$institution->user->country),
                'city' => $institution->user->city,
                'we_are_in' => $institution->user->city . ', ' . trans('global.'.$institution->user->country),
                'photo' => asset(User::$photoPath.$institution->user->image),
            );
        }
        return array(
            'data' => $institutions,
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
        })->select('student_languages.name')
          ->groupBy('student_languages.name')
          ->whereNotNull('student_languages.level')
          ->get();

        $availableCountries = User::where('userable_type', Student::class)
                                        ->select("country")
                                        ->whereNotNull('country')
                                        ->where('visible', true)
                                        ->where('is_filled', true)
                                        ->where('banned', false)
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
                'id' => $language->name,
                'name' => StudentLanguage::$languages[$language->name]["name"]
            );
        }

        foreach ($availableCountries as $country) {
            $countries[] = array(
                'id' => $country->country,
                'name' => trans('global.'.$country->country)
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
                                        ->where('visible', true)
                                        ->where('is_filled', true)
                                        ->where('banned', false)
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
                'name' => trans('global.'.$country->country)
            );
        }


        $data[] = array(
            'id' => 'activities',
            'title' => trans('reg-profile.company_activity'),
            'items' => $companySectors            
        );

        $data[] = array(
            'id' => 'countries',
            'title' => trans('reg-profile.countries'),
            'items' => $countries
        );

        $data[] = array(
            'id' => 'job_offers',
            'title' => trans('reg-profile.job_offers'),
            'items' => array(array( "id" => "has-offers", "name" => trans('reg-profile.has_job_offers')),
                        array( "id" => "has-job-portal", "name" => trans('reg-profile.has_job_portal')))            
        );

        return $data;
    }
}