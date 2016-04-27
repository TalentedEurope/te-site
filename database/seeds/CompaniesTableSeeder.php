<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach ((range(1, 10)) as $index) {
            $user = User::create([
                'name' => $faker->unique()->company,
                'email' => $faker->unique()->email                
            ]);

            $company = Company::create([
                'fiscal_id' => $faker->randomNumber(8),
                'overseer' => $faker->unique()->name,
                'address' => $faker->address,
                'activity' => $faker->word

            ]);
            $company->user()->save($user);
        }
    }
}
