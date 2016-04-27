<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

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

    public function languages()
    {
        return $this->hasMany('App\Models\StudentLanguage');
    }

    public function validationRequest()
    {
        return $this->hasOne('App\Models\ValidationRequest');
    }

    public function knowledgeSkills()
    {
        return $this->belongsToMany('\App\Models\KnowledgeSkill');
    }

    public function personalSkills()
    {
        return $this->belongsToMany('\App\Models\PersonalSkill');
    }


}