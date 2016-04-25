<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Institution;

class InstitutionsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach ((range(1, 10)) as $index) {
            $user = User::create([
                'name' => $faker->unique()->company,
                'email' => $faker->unique()->email                
            ]);

            $institution = Institution::create([
                'type' => Institution::$types[
                            rand(0,sizeOf(Institution::$types) -1)
                          ],                            
                'overseer' => $faker->unique()->name,
                'address' => $faker->address,
                'country' => Institution::$countries[
                               rand(0,sizeOf(Institution::$countries) -1)
                             ]
            ]);
            $institution->user()->save($user);
        }
    }
}
