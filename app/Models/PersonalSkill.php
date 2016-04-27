<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalSkill extends Model
{
    public $timestamps = false;

    public static $rules = array(
            'name_en' => 'required',
            'name_sp' => 'required',
            'name_it' => 'required',
            'name_de' => 'required',            
            'name_fr' => 'required', 
    );

    public function students()
    {
        return $this->belongsToMany('\App\Models\Student');
    }    
}
