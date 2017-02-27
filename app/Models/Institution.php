<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    public $timestamps = false;


    public static function rules($institution, $only_key = false)
    {
        $filter = array(
            'overseer' => 'sometimes|required',
            'type' => 'sometimes|required|in:'.implode(',', Institution::$types),
            'pic' => 'sometimes|required',
            'fiscal_id' => 'sometimes|required|alpha_dash',
            'certificate' => 'sometimes|required|mimes:pdf,jpg,png'
        );

        if ($only_key) {
            return array($only_key => $filter[$only_key]);
        } else {
            return $filter;
        }
    }

    public static $certificatePath = '/uploads/certificate/';

    public static $types = ['HEI_VET','HEI_HIS','UFA'];
    public static $countries = ['AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'SP', 'SE', 'UK'];

    public function user()
    {
        return $this->morphOne('\App\Models\User', 'userable');
    }

    public function validators()
    {
        return $this->hasMany('App\Models\Validator');
    }

    public static function getTypes($categorized = false)
    {
        if ($categorized) {
            return array(
                trans('reg-profile.institution_hei') => array(
                    'HEI_HIS' => trans('reg-profile.insitution_his'),
                    'HEI_VET' => trans('reg-profile.institution_vet'),
                ),
                trans('reg-profile.institution_ufa') => array(
                    'UFA' => trans('reg-profile.institution_ufa'),
                ),
            );
        }

        return array(
            '' => trans('reg-profile.institution_hei'),
            'HEI_HIS' => trans('reg-profile.insitution_his'),
            'HEI_VET' => trans('reg-profile.institution_vet'),
            'UFA' => trans('reg-profile.institution_ufa'),
        );
    }

    public static function getRandom()
    {
        $items = \App\Models\User::where('userable_type', \App\Models\Institution::class)->inRandomOrder()->where('image', '!=', '')->limit(18)->select('userable_id')->get()->map(function ($item, $key) {
            return $item->userable_id;
        })->toArray();
        return \App\Models\Institution::whereIn('id', $items)->get();
    }
}
