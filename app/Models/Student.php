<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;


class Student extends Model
{
    use eloquence;

    public $timestamps = false;
    protected $with = ['studies', 'languages', 'personalSkills', 'professionalSkills', 'validationRequest'];

    public static $nationalities = ['AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'SP', 'SE', 'UK'];

    public static $curriculumPath = '/uploads/curriculum/';
    public static $studyGradeCardPath = '/uploads/gradecard/';
    public static $studyCertificatePath = '/uploads/certificate/';

    public static $rules = array(
        'address' => 'required',
        'nationality' => 'required',
        'birthdate' => 'required',
        'curriculum' => 'required',
        'valid' => 'required',
        'renewed_at' => 'required',
        'visible' => 'required',
    );

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
