<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validator extends Model
{
    public $timestamps = false;
    protected $fillable = ['department', 'position'];


    public static function rules($institution = null, $keyOnly = false)
    {
        $filter = array(
            'department' => 'sometimes|required',
            'position' => 'sometimes|required',
            'enabled' => 'sometimes|required|in:1,0'
        );

        if ($keyOnly) {
            return array($keyOnly => $filter[$keyOnly]);
        } else {
            return $filter;
        }
    }

    public static function niceNames()
    {
        $niceNames = array(
            'department' => 'Department',
            'position' => 'Position',
        );
        return $niceNames;
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

    public function canValidate()
    {
        if (!$this->institution) {
            return false;
        }
        if (!$this->institution->user) {
            return false;
        }
        if (!$this->institution) {
            return false;
        }
        if (!$this->institution->user->is_filled) {
            return false;
        }
        return true;
    }
}
