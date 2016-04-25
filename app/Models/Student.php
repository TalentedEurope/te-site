<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    public static $rules = array(
            'address' => 'required',            
            'nationality' => 'required',
            'birthdate' => 'required',
            'curriculum' => 'required',
            'valid' => 'required',
            'renewed_at' => 'required',
            'visible' => 'required',
    );

    public function user()
    {
        return $this->morphOne('User', 'userable');
    } 

    public function validationRequest()
    {
        return $this->hasOne('App\Models\ValidationRequest');
    }
}