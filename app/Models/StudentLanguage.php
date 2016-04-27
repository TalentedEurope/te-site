<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentLanguage extends Model
{
    public static $rules = array(
            'name' => 'required',
            'level' => 'required',
            'student_id' => 'required'
    );

    public static $levels = ['Lang_level_A1','Lang_level_A2','Lang_level_B1','Lang_level_B2','Lang_level_C1','Lang_level_C2'];

	public function student()
	{
		return $this->belongsTo('App\Models\Student');
	}
}
