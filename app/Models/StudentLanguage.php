<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentLanguage extends Model
{
    public $timestamps = false;

    public static $rules = array(
            'name' => 'required',
            'level' => 'required',
            'student_id' => 'required'
    );

	public function student()
	{
		return $this->belongsTo('App\Models\Student');
	}
}

}
