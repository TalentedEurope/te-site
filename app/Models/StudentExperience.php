<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentExperience extends Model
{
    public $timestamps = false;

    public static $rules = array(
            'company' => 'required',
            'from' => 'required',
            'tasks' => 'required',
            'student_id' => 'required'
    );

	public function student()
	{
		return $this->belongsTo('App\Models\Student');
	}    
}
