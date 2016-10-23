<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alert extends Model
{
    use SoftDeletes;

    public static $rules = array(
            'origin' => 'required',
            'target' => 'required',
    );

    public function origin()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function target()
    {
        return $this->belongsTo('App\Models\User');
    }
}
