<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use App\Models\StudentStudy;
use App\Models\StudentLanguage;
use App;

class Student extends Model
{
    use eloquence;

    public $timestamps = false;
    protected $with = ['studies', 'languages', 'personalSkills', 'professionalSkills', 'validationRequest'];

    protected $attributes = array(
      'valid' => 'pending'
    );

    public static $nationalities = ["AF", "AX", "AL", "DZ", "AS", "AD", "AO", "AI", "AQ", "AG", "AR", "AM", "AW", "AU", "AT", "AZ", "BS", "BH", "BD", "BB", "BY", "BE", "BZ", "BJ", "BM", "BT", "BO", "BQ", "BA", "BW", "BV", "BR", "IO", "BN", "BG", "BF", "BI", "CV", "KH", "CM", "CA", "KY", "CF", "TD", "CL", "CN", "CX", "CC", "CO", "KM", "CG", "CD", "CK", "CR", "CI", "HR", "CU", "CW", "CY", "CZ", "DK", "DJ", "DM", "DO", "EC", "EG", "SV", "GQ", "ER", "EE", "ET", "FK", "FO", "FJ", "FI", "FR", "GF", "PF", "TF", "GA", "GM", "GE", "DE", "GH", "GI", "GR", "GL", "GD", "GP", "GU", "GT", "GG", "GN", "GW", "GY", "HT", "HM", "VA", "HN", "HK", "HU", "IS", "IN", "ID", "IR", "IQ", "IE", "IM", "IL", "IT", "JM", "JP", "JE", "JO", "KZ", "KE", "KI", "KP", "KR", "KW", "KG", "LA", "LV", "LB", "LS", "LR", "LY", "LI", "LT", "LU", "MO", "MK", "MG", "MW", "MY", "MV", "ML", "MT", "MH", "MQ", "MR", "MU", "YT", "MX", "FM", "MD", "MC", "MN", "ME", "MS", "MA", "MZ", "MM", "NA", "NR", "NP", "NL", "NC", "NZ", "NI", "NE", "NG", "NU", "NF", "MP", "NO", "OM", "PK", "PW", "PS", "PA", "PG", "PY", "PE", "PH", "PN", "PL", "PT", "PR", "QA", "RE", "RO", "RU", "RW", "BL", "SH", "KN", "LC", "MF", "PM", "VC", "WS", "SM", "ST", "SA", "SN", "RS", "SC", "SL", "SG", "SX", "SK", "SI", "SB", "SO", "ZA", "GS", "SS", "ES", "LK", "SD", "SR", "SJ", "SZ", "SE", "CH", "SY", "TW", "TJ", "TZ", "TH", "TL", "TG", "TK", "TO", "TT", "TN", "TR", "TM", "TC", "TV", "UG", "UA", "AE", "GB", "US", "UM", "UY", "UZ", "VU", "VE", "VN", "VG", "VI", "WF", "EH", "YE", "ZM", "ZW"];

    public static $curriculumPath = '/uploads/curriculum/';
    public static $studyGradeCardPath = '/uploads/gradecard/';
    public static $studyCertificatePath = '/uploads/certificate/';

    public static function rules($forModelValidation = false, $keyOnly = false)
    {
        $filter = array(
            'nationality' => 'sometimes|required|in:'.implode(',', Student::$nationalities),
            'birthdate' => 'sometimes',
            'curriculum' => 'mimes:pdf',
            'renewed_at' => 'sometimes|required',
            'talent' => 'sometimes|min:10|required|max:300',
            'studies' => 'array|min:1',
            'languages' => 'array',
            'curriculum' => 'sometimes|required|file',
            'personalSkills' => 'array|max:6',
            'professionalSkills' => 'array|max:6'
        );

        $filterRelated = array(
            'studies.*.institution_name' => 'sometimes|required|regex:/^[\pL\s\-\,\.]+$/u',
            'studies.*.name' => 'sometimes|required|regex:/^[\pL\s\-\,\.]+$/u',
            'studies.*.level' => 'sometimes|required|in:'.implode(',', StudentStudy::$levels),
            'studies.*.field' => 'sometimes|required|in:'.implode(',', StudentStudy::$fields),
            'studies.*.certificate' => 'mimes:pdf',
        );

        if ($forModelValidation) {
            $filter = array_merge($filter, $filterRelated);
            unset($filter["curriculum"]);
            unset($filter["studies.*.certificate"]);
        }

        if ($keyOnly) {
            return array($keyOnly => $filter[$keyOnly]);
        } else {
            return $filter;
        }
    }

    public static function niceNames()
    {
        $niceNames = array(
            'nationality' => trans('reg-profile.nationality'),
            'birthdate' => trans('reg-profile.student_birthdate'),
            'curriculum' => trans('reg-profile.student_europass'),
            'renewed_at' => 'Renewed At',
            'talent' => trans('reg-profile.my_talent'),
            'studies' => trans_choice('reg-profile.study', 2),
            'languages' => trans('reg-profile.student_languages'),
            'personalSkills' => trans('reg-profile.student_personal_skills'),
            'professionalSkills' => trans('reg-profile.student_professional_skills'),
            'studies.*.institution_name' => trans('reg-profile.study_institution_name'),
            'studies.*.name' => trans('reg-profile.study_name'),
            'studies.*.level' => trans('reg-profile.study_level'),
            'studies.*.field' => trans('reg-profile.study_field'),
            'studies.*.certificate' => trans('reg-profile.study_certificate'),
            'studies.*.gradecard' => trans('reg-profile.study_gradecard'),
            'trainings.*.name' => trans('reg-profile.training_name'),
            'trainings.*.date' => trans('reg-profile.training_date'),
            'trainings.*.certificate' => trans('reg-profile.training_certificate'),
            'languages.*.name' =>  trans('reg-profile.student_language_name'),
            'languages.*.level' =>  trans('reg-profile.student_language_level'),
            'languages.*.certificate' => trans('reg-profile.language_certificate'),
            'professionalSkills.*.name' =>  trans('reg-profile.professional_skills_name'),
            'experiences.*.company' =>  trans('reg-profile.work_experience_company'),
            'experiences.*.from' =>  trans('reg-profile.work_experience_from'),
            'experiences.*.until' =>  trans('reg-profile.work_experience_until'),
            'experiences.*.position' =>  trans('reg-profile.work_experience_position'),
        );
        return $niceNames;
    }

    public static function relatedNiceNames($related, $keyOnly = false)
    {
        $relatedNames = array(
            'studies' => array(
                'institution_name' => trans('reg-profile.study_institution_name'),
                'name' => trans('reg-profile.study_name'),
                'level' => trans('reg-profile.study_level'),
                'field' => trans('reg-profile.study_field'),
                'certificate' => trans('reg-profile.study_certificate'),
                'gradecard' => trans('reg-profile.study_gradecard')
            ),

            'trainings' => array (
                'name' =>  trans('reg-profile.training_name'),
                'date' => trans('reg-profile.training_date'),
                'certificate' => trans('reg-profile.training_certificate'),
            ),

            'languages' => array (
                'name' =>  trans('reg-profile.student_language_name'),
                'level' =>  trans('reg-profile.student_language_level'),
                'certificate' => trans('reg-profile.language_certificate'),
            ),

            'professionalSkills' => array (
                'name' =>  trans('reg-profile.professional_skills_name'),
            ),

            'experiences' => array (
                'company' =>  trans('reg-profile.work_experience_company'),
                'from' =>  trans('reg-profile.work_experience_from'),
                'until' =>  trans('reg-profile.work_experience_until'),
                'position' =>  trans('reg-profile.work_experience_position'),
            ),
        );
        $filter = $relatedNames[$related];
        if ($keyOnly) {
            return array($keyOnly => $filter[$keyOnly]);
        } else {
            return $filter;
        }
    }



    public static function rulesRelated($related, $keyOnly = false)
    {
        $relatedRules = array(
            'studies' => array(
                'institution_name' => 'required|regex:/^[\pL\s\-\,\.]+$/u',
                'name' => 'required|regex:/^[\pL\s\-\,\.]+$/u',
                'level' => 'required|in:'.implode(',', StudentStudy::$levels),
                'field' => 'required|in:'.implode(',', StudentStudy::$fields),
                'certificate' => 'mimes:pdf',
                'gradecard' => 'mimes:pdf'
            ),

            'trainings' => array (
                'name' => 'required|regex:/^[\pL\s\-\,\.]+$/u',
                'date' => 'required|date',
                'certificate' => 'mimes:pdf',
            ),

            'languages' => array (
                'name' =>  'required|in:'.implode(',', array_keys(StudentLanguage::$languages)),
                'level' =>  'required|in:'.implode(',', StudentLanguage::$levels),
                'certificate' => 'mimes:pdf',
            ),

            'professionalSkills' => array (
                'name' =>  'required|regex:/^[\pL\s\-\,\.]+$/u',
            ),

            'experiences' => array (
                'company' =>  'required|regex:/^[\pL\s\-\,\.]+$/u',
                'from' =>  'required|date',
                'until' =>  'date',
                'position' =>  'required|regex:/^[\pL\s\-\,\.]+$/u',
            ),
        );
        $filter = $relatedRules[$related];
        if ($keyOnly) {
            return array($keyOnly => $filter[$keyOnly]);
        } else {
            return $filter;
        }
    }

    // TODO: In the future when theres enough users: Limit them to ready users or validated ones.
    public static function getRecent()
    {
        $recent = \App\Models\User::where('is_filled', true)->where('visible', true)->where('userable_type', \App\Models\Student::class)->orderBy('created_at', 'desc')->limit(6)->select('userable_id')->get()->map(function ($item, $key) {
            return $item->userable_id;
        })->toArray();
        return \App\Models\Student::whereIn('id', $recent)->get();
    }

    public function user()
    {
        return $this->morphOne('\App\Models\User', 'userable');
    }

    public function studies()
    {
        return $this->hasMany('App\Models\StudentStudy');
    }

    public function training()
    {
        return $this->hasMany('App\Models\StudentTraining');
    }

    public function languages()
    {
        return $this->hasMany('App\Models\StudentLanguage');
    }

    public function experiences()
    {
        return $this->hasMany('App\Models\StudentExperience');
    }

    public function validationRequest()
    {
        return $this->hasOne('App\Models\ValidationRequest');
    }

    public function professionalSkills()
    {
        return $this->belongsToMany('\App\Models\ProfessionalSkill');
    }

    public function personalSkills()
    {
        return $this->belongsToMany('\App\Models\PersonalSkill')->withPivot('validator');
    }

    public function groupedPersonalSkills()
    {
        $skills = array();
        foreach ($this->personalSkills as $skill) {
            if (isset($skills[$skill->id])) {
                $skills[$skill->id] = array('name' => $skill[App::getLocale()], 'repeated' => true);
            } else {
                $skills[$skill->id] = array('name' => $skill[App::getLocale()], 'repeated' => false);
            }
        }
        return $skills;
    }


    private function countFields($fields, $max, $oneFull = false)
    {
        $count = 0;
        $fieldSize = sizeof($fields);
        foreach ($fields as $value) {
            if ($value) {
                $count++;
            }
        }
        $res = round($count/$fieldSize * $max, 2);
        if ($oneFull) {
            if ($res != 0) {
                return $max;
            }
            return 0;
        }
        return $res;
    }

    public function calculateLockedStatus()
    {        
        $validationReqDate = null;
        if ($this->validationRequest) {
            $validationReqDate = $this->validationRequest->created_at;
        }
        foreach ($this->studies as $item) {
            if ($validationReqDate && $item->created_at < $validationReqDate && $this->valid == 'validated') {
                $item->locked = true;
                $item->save();
            } else {
                $item->locked = false;
                $item->save();
            }
        }
        foreach ($this->training as $item) {
            if ($validationReqDate && $item->created_at < $validationReqDate && $this->valid == 'validated') {
                $item->locked = true;
                $item->save();
            } else {
                $item->locked = false;
                $item->save();
            }
        }
        foreach ($this->languages as $item) {
            if ($validationReqDate && $item->created_at < $validationReqDate && $this->valid == 'validated') {
                $item->locked = true;
                $item->save();
            } else {
                $item->locked = false;
                $item->save();
            }
        }
        foreach ($this->experiences as $item) {
            if ($validationReqDate && $item->created_at < $validationReqDate && $this->valid == 'validated') {
                $item->locked = true;
                $item->save();
            } else {
                $item->locked = false;
                $item->save();
            }
        }
    }

    public function fillRate()
    {
        // We're weighting the fill rate like this.
        // Basic data 10%
        // Social networks: at least 1. 10%
        // Contact information 10%
        // Study. 20-30%. (First one 20%, afterwards the extra 10%)
        // Training. 20% (if it has more than one study. this wont be neccesary)
        // Language 15%
        // Work experience 15%
        // Professional skills 5%
        // Personal skills 5%
        // Describe talent 10%
        // ----
        // Note. It gives more than 100%.
        // But thats to be expected.
        // It will max at 100% tho

        // Basic information.
        $basic = $this->countFields(array(
            $this->user->name,
            $this->user->surname,
            $this->user->phone,
            $this->nationality,
            $this->birthdate,
        ), 10);

        $social = $this->countFields(array(
            $this->user->facebook,
            $this->user->twitter,
            $this->user->linkedin,
        ), 10, true);

        $contact = $this->countFields(array(
            $this->user->postal_code,
            $this->user->city,
            $this->user->country,
        ), 9) + $this->countFields(array(
            $this->user->address
        ), 1, true);

        $studies = 0;
        $idx = 0;
        foreach ($this->studies as $study) {
            $studyValue = $idx == 0? 20: 10;
            $studies += $this->countFields(array(
                $study->name,
                $study->institution_name,
                $study->level,
                $study->field,
                $study->certificate,
                $study->gradecard
            ), $studyValue);
            $idx++;
        }
        if ($studies > 30) {
            $studies = 30;
        }

        $trainings = 0;
        foreach ($this->training as $training) {
            $trainings += $this->countFields(array(
                $training->name,
                $training->certificate,
                $training->date
            ), 10);
        }
        if ($trainings > 10) {
            $trainings = 10;
        }

        $languages = 0;
        foreach ($this->languages as $language) {
            $languages += $this->countFields(array(
                $language->name,
                $language->level,
            ), 4);
            $languages += $this->countFields(array(
                $language->certificate
            ), 1, true);
        }
        if ($languages > 15) {
            $languages = 15;
        }

        $experiences = 0;
        foreach ($this->experiences as $experience) {
            $experiences += $this->countFields(array(
                $experience->company,
                $experience->from,
                $experience->until,
                $experience->position
            ), 7.5);
        }
        if ($experiences > 15) {
            $experiences = 15;
        }

        $professionalSkills = 0;
        if ($this->professionalSkills->count()) {
            $professionalSkills += 5;
        }

        $personalSkills = 0;
        if ($this->personalSkills->count()) {
            $personalSkills += 5;
        }

        $talent = $this->countFields(array(
            $this->talent
        ), 10, true);

        $total = $basic + $social + $contact + $studies + $trainings + $languages + $experiences + $professionalSkills + $personalSkills + $talent;

        if ($total > 100) {
            $total = 100;
        }
        return $total;
    }
}
