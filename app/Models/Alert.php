<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use DB;

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

    public static function isAllowed($originId, $targetId)
    {
        $alerts = Alert::where('origin_id', $originId)->where('target_id', $targetId)->orderBy('created_at')->get();
        if ($alerts->count() == 0) {
            return true;
        } else {
            return Carbon::now()->subDays(env("MIN_ALERT_DAYS", 1))->gte($alerts->last()->created_at);
        }
    }

    public static function getUnreadAlertCount($user)
    {
        return Alert::where('target_id', $user->id)->where('created_at', '=', DB::raw('updated_at'))->count();
    }
}
