<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    public static $rules = array(
            'origin' => 'required',
            'target' => 'required',
            'message' => 'required',
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
