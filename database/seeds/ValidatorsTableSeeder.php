<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Institution;
use App\Models\Validator;

class ValidatorsTableSeeder extends Seeder
{
    public function run()
    {
        //Let's create an empty validator:
        $user = User::create([
            'email' => 'test@validator',
        ]);
        Bouncer::assign('validator')->to($user);
        $user->password = Hash::make('secret');
        $user->save();

        $faker = Faker\Factory::create();
        $institutions = Institution::all();
        foreach ($institutions as $institution) {
            foreach (range(0, rand(1, 5)) as $index) {
                $user = User::create([
                    'name' => $faker->unique()->name,
                    'email' => $faker->unique()->email,
                ]);
                $validator = Validator::create([
                    'department' => $faker->word,
                    'position' => $faker->word,
                    'institution_id' => $institution->id,
                ]);
                $validator->user()->save($user);
            }
        }
    }
}
