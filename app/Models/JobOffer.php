<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class JobOffer extends Model
{   
    public static function rules($only_key = false)
    {
        $filter = array(
            'title' => 'required',
        );

        if ($only_key) {
            return array($only_key => $filter[$only_key]);
        } else {
            return $filter;
        }
    }    
    
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
