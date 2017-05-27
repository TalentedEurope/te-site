<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class StudentTraining extends Model
{
    use Eloquence;

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
