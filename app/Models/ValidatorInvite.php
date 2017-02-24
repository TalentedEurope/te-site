<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class ValidatorInvite extends Model
{
    use Notifiable;
    use SoftDeletes;

    public static function rules($only_key = false)
    {
        $filter = array(
            'email' => 'required|email|can_be_validator',
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

    public static function getSent($institution)
    {
        return ValidatorInvite::where('institution_id', $institution->id)->get();
    }

    public static function cleanup()
    {
        return ValidatorInvite::where('created_at', '<=', Carbon::now()->subDays(env('CLEANUP_DAYS', 14)))->delete();
    }
}
