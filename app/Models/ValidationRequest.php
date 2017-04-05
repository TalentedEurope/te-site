<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class ValidationRequest extends Model
{
    use Notifiable;
    protected $fillable = ['validator_name', 'validator_email', 'student_id', 'validator_id'];

    public static $rules = array(
        'status' => 'required|in:valid,invalid',
        'personalSkills' => 'sometimes|required|array|max:6',
        'comment' => 'sometimes|required|max:300',
        'reason' => 'required_if:status,invalid|in:nocriteria,nostudent'
    );

    public static $status = ['pending', 'validated', 'denied'];

    public static function boot()
    {
        parent::boot();
        self::created(function ($model) {
            $model->student->calculateLockedStatus();
        });

        self::deleted(function ($model) {
            $model->student->calculateLockedStatus();
        });
    }

    public static function invalidReasons()
    {
        return array(
            'nocriteria' => trans('students-validation.criteria'),
            'nostudent' => trans('students-validation.nostudent'),
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

    public function routeNotificationForMail()
    {
        return $this->validator_email;
    }

    public static function cleanup()
    {
        return ValidationRequest::where('created_at', '<=', Carbon::now()->subDays(env('CLEANUP_DAYS', 14)))->delete();
    }
}
