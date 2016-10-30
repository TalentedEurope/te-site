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

    public static $nationalities = ['AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'SP', 'SE', 'UK'];

    public static $curriculumPath = '/uploads/curriculum/';
    public static $studyGradeCardPath = '/uploads/gradecard/';
    public static $studyCertificatePath = '/uploads/certificate/';

    public static function rules($only_key = false)
    {
        $filter = array(
            'address' => 'required',
            'nationality' => 'required|in:'.implode(',', Student::$nationalities),
            'birthdate' => 'required|date',
            'curriculum' => 'required',
            'valid' => 'required',
            'renewed_at' => 'required',
            'visible' => 'required',
            'talent' => 'required|max:300',
            'studies' => 'array|min:1',
            'languages' => 'array',
            'personalSkills' => 'array|max:6',
            'professionalSkills' => 'array|max:6'
        );

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
                'studies_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'level' => 'required|in:'.implode(',', StudentStudy::$levels),
                'study_field' => 'required|in:'.implode(',', StudentStudy::$fields),
                'certificate' => 'required|mimes:pdf',
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
        return $this->belongsToMany('\App\Models\PersonalSkill');
    }
}
