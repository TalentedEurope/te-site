<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentStudy extends Model
{
    public static $rules = array(
            'name' => 'required',
            'level' => 'required',
            'certificate' => 'required',
            'student_id' => 'required'
    );

    public static $levels = ['studies_level_5', 'studies_level_6', 'studies_level_7', 'studies_level_8'];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }    
}
