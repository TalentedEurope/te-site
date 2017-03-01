<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Institution;
use App\Models\Student;

class InstitutionsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        //Let's create an empty institution:
        $user = User::create([
            'email' => 'test@institution',
            'name' => 'My test institution',
            'country' => Student::$nationalities[
                            rand(0, sizeOf(Student::$nationalities) - 1)],
        ]);
        $user->password = Hash::make('secret');
        $user->verified = 1;
        $user->save();
        $institution = Institution::create([
            'type' => Institution::$types[
                        rand(0, sizeOf(Institution::$types) - 1)
                      ],
            'overseer' => $faker->unique()->name,
        ]);
        $institution->user()->save($user);

        Bouncer::assign('institution')->to($user);

        foreach ((range(1, 10)) as $index) {
            $user = User::create([
                'name' => $faker->unique()->company,
                'email' => $faker->unique()->email,
                'country' => Student::$nationalities[
                            rand(0, sizeOf(Student::$nationalities) - 1)],
            ]);

            $institution = Institution::create([
                'type' => Institution::$types[
                            rand(0, sizeOf(Institution::$types) - 1)
                          ],
                'overseer' => $faker->unique()->name,
            ]);
            $institution->user()->save($user);
        }
    }
}
