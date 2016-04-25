<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValidationRequest extends Model
{
    public static $rules = array(
            'student_id' => 'required',
    );

	public function validator()
	{
		return $this->belongsTo('App\Models\Validator');
	}

	public function student()
	{
		return $this->belongsTo('App\Models\Student');
	}
}
