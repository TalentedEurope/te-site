<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentTraining extends Model
{
    public static $rules = array(
            'name' => 'required',
            'certificate' => 'required',
            'date' => 'required',
    );

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
}
