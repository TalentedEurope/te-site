<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Institution;
use App\Models\Validator;
use App\Models\User;

class ModelsTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
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

	    $this->assertEquals($institution->validators()->count(), 1);
    }
}
