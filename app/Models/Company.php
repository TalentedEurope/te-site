<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;

    public static $rules = array(
            'overseer' => 'required',
            'fiscal_id' => 'required|unique:companies',
            'address' => 'required',
            'activity' => 'required',
    );

    public function user()
    {
        return $this->morphOne('\App\Models\User', 'userable');
    }   
}
