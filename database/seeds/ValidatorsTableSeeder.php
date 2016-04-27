<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Institution;
use App\Models\Validator;

class ValidatorsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $institutions = Institution::all();
        foreach ($institutions as $institution) {
            foreach (range(0, rand(1,5)) as $index) {
                $user = User::create([
                    'name' => $faker->unique()->name,
                    'email' => $faker->unique()->email                
                ]);
                $validator = Validator::create([
                    'department' => $faker->word,
                    'position' => $faker->word,
                    'institution_id' => $institution->id
                ]);
                $validator->user()->save($user);
            }
        }
    }
}
