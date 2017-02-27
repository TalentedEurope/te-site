<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValidationRequest extends Model
{
    public static $rules = array(
        'status' => 'required|in:valid,invalid',
        'personalSkills' => 'sometimes|required|array|max:6',
        'comment' => 'sometimes|required|max:300',
        'reason' => 'required_if:status,invalid|in:nocriteria,nostudent'
    );

    public static $status = ['pending', 'validated', 'denied'];

    public static function invalidReasons()
    {
        return array(
            'nocriteria' => trans('validation.criteria'),
            'nostudent' => trans('validation.nostudent'),
        );
    }

    public function validator()
    {
        return $this->belongsTo('App\Models\Validator');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function getValidator()
    {
        if ($this->validator_name) {
            return $this->validator_name;
        }
        return $this->validator->user->fullName;
    }
}
