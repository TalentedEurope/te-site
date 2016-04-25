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


    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }    
}
