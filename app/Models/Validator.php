<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validator extends Model
{
    public $timestamps = false;
    protected $fillable = ['department', 'position'];


    public static function rules($institution = null, $only_key = false)
    {
        $filter = array(
            'department' => 'sometimes|required',
            'position' => 'sometimes|required',
            'enabled' => 'sometimes|required|in:1,0'
        );

        if ($only_key) {
            return array($only_key => $filter[$only_key]);
        } else {
            return $filter;
        }
    }


    public function institution()
    {
        return $this->belongsTo('App\Models\Institution');
    }

    public function validationRequest()
    {
        return $this->hasMany('App\Models\ValidationRequest');
    }

    public function user()
    {
        return $this->morphOne('\App\Models\User', 'userable');
    }
}
