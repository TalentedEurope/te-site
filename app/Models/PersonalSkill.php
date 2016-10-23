<?php

namespace App\Models;

use Config;
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

    public function getNameAttribute()
    {
        $name = $this->en;
        if (isset($this->attributes[Config::get('app.locale')])) {
            $name = $this->attributes[Config::get('app.locale')];
        }
        return $name;
    }

    public static function getFormattedArray()
    {
        $skills = PersonalSkill::all();
        $personalSkills = array();
        foreach ($skills as $item) {
            $personalSkills[] = array(
                'code' => $item->id,
                'name' => $item->name
            );
        }
        return $personalSkills;
    }
}
