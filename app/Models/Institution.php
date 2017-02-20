<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    public $timestamps = false;

    public static $rules = array(
            'overseer' => 'required',
            'type' => 'required',
            'address' => 'required',
            'country' => 'required',
    );

    public static $types = ['HEI','VET'];
    public static $countries = ['AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'SP', 'SE', 'UK'];

    public function user()
    {
        return $this->morphOne('\App\Models\User', 'userable');
    }

    public function validators()
    {
        return $this->hasMany('App\Models\Validator');
    }

    public static function getRandom()
    {
        $items = \App\Models\User::where('userable_type', \App\Models\Institution::class)->inRandomOrder()->where('image', '!=', '')->limit(18)->select('userable_id')->get()->map(function ($item, $key) {
            return $item->userable_id;
        })->toArray();
        return \App\Models\Institution::whereIn('id', $items)->get();
    }
}
