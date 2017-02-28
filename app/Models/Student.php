<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use App\Models\StudentStudy;
use App\Models\StudentLanguage;

class Student extends Model
{
    use eloquence;

    public $timestamps = false;
    protected $with = ['studies', 'languages', 'personalSkills', 'professionalSkills', 'validationRequest'];

    public static $nationalities = ['AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE', 'GB'];

    public static $curriculumPath = '/uploads/curriculum/';
    public static $studyGradeCardPath = '/uploads/gradecard/';
    public static $studyCertificatePath = '/uploads/certificate/';

    public static function rules($forModelValidation = false, $only_key = false)
    {
        $filter = array(
            'nationality' => 'sometimes|required|in:'.implode(',', Student::$nationalities),
            'birthdate' => 'sometimes|required|date',
            'curriculum' => 'mimes:pdf',
            'valid' => 'sometimes|required',
            'renewed_at' => 'sometimes|required',
            'talent' => 'sometimes|required|max:300',
            'studies' => 'array|min:1',
            'languages' => 'array',
            'curriculum' => 'sometimes|required|file',
            'personalSkills' => 'array|max:6',
            'professionalSkills' => 'array|max:6'
        );

        $filterRelated = array(
            'studies.*.institution_name' => 'sometimes|required|regex:/^[\pL\s\-]+$/u',
            'studies.*.name' => 'sometimes|required|regex:/^[\pL\s\-]+$/u',
            'studies.*.level' => 'sometimes|required|in:'.implode(',', StudentStudy::$levels),
            'studies.*.field' => 'sometimes|required|in:'.implode(',', StudentStudy::$fields),
            'studies.*.certificate' => 'mimes:pdf',
        );

        if ($forModelValidation) {
            $filter = array_merge($filter, $filterRelated);
            unset($filter["curriculum"]);
            unset($filter["studies.*.certificate"]);
        }

        if ($only_key) {
            return array($only_key => $filter[$only_key]);
        } else {
            return $filter;
        }
    }


    public static function rulesRelated($related, $only_key = false)
    {
        $relatedRules = array(
            'studies' => array(
                'institution_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'level' => 'required|in:'.implode(',', StudentStudy::$levels),
                'field' => 'required|in:'.implode(',', StudentStudy::$fields),
                'certificate' => 'mimes:pdf',
                'gradecard' => 'mimes:pdf'
            ),

            'trainings' => array (
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'date' => 'required|date',
                'certificate' => 'mimes:pdf',
            ),

            'languages' => array (
                'name' =>  'required|in:'.implode(',', array_keys(StudentLanguage::$languages)),
                'level' =>  'required|in:'.implode(',', StudentLanguage::$levels),
                'certificate' => 'mimes:pdf',
            ),

            'professionalSkills' => array (
                'name' =>  'required|regex:/^[\pL\s\-]+$/u',
            ),

            'experiences' => array (
                'company' =>  'required|regex:/^[\pL\s\-]+$/u',
                'from' =>  'required|date',
                'until' =>  'date',
                'position' =>  'required|regex:/^[\pL\s\-]+$/u',
            ),
        );
        $filter = $relatedRules[$related];
        if ($only_key) {
            return array($only_key => $filter[$only_key]);
        } else {
            return $filter;
        }
    }

    // TODO: In the future when theres enough users: Limit them to ready users or validated ones.
    public static function getRecent()
    {
        $recent = \App\Models\User::where('is_filled', true)->where('userable_type', \App\Models\Student::class)->orderBy('created_at', 'desc')->limit(6)->select('userable_id')->get()->map(function ($item, $key) {
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
}
