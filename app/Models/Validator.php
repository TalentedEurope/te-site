<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validator extends Model
{
    public $timestamps = false;

    public static $rules = array(
            'institution_id' => 'required',
            'department' => 'required',
            'position' => 'required'
    );

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
}


/*
	use App\Models\Institution;
	use App\Models\Validator;
	use App\Models\User;

	// Create institution
	$user = new User;
	$user->name = 'Institution';
	$user->email = 'Institution@institution.com';
	$institution = new Institution;
	$institution->type = 'Test';
	$institution->overseer = 'Test Overseer';
	$institution->address = 'Test';
	$institution->country = 'SP';	
	$institution->save();
	$institution->user()->save($user);

	// Create validator;
	$user = new User;
	$user->name = 'Validator';
	$user->email = 'validator@institution.com';
	$validator = new Validator;
	$validator->institution()->associate($institution);
	$validator->department = "Department";
	$validator->position = "Position";
	$validator->save();
	$validator->user()->save($user);

	Institution::first()->validators();
	Validator::first();
*/