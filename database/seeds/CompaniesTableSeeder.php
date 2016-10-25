<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\PersonalSkill;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        //Let's create an empty company
        $user = User::create([
            'name' => $faker->company,
            'email' => 'test@company',
            'phone' => $faker->phoneNumber,
            'facebook' => $faker->url,
            'twitter' => $faker->url,
            'linkedin' => $faker->url,
            'address' => $faker->streetAddress,
            'postal_code' => $faker->postcode,
            'city' => $faker->city,
            'country' => array_keys(User::$countries)[rand(0, sizeof(array_keys(User::$countries)) - 1)],
        ]);
        $user->password = Hash::make('secret');
        $user->verified = true;
        $user->visible = true;
        $user->is_filled = true;

        $user->save();
        Bouncer::assign('company')->to($user);
        $company = Company::create([
            'fiscal_id' => $faker->randomNumber(8),
            'overseer' => $faker->unique()->name,
            'website' => $faker->url,
            'talent' => $faker->sentence,
            'notification_email' => $faker->unique()->email,
            'notification_name' => $faker->company,
        ]);
        $company_activity = Company::$activities[rand(0, sizeof(Company::$activities)) - 1];
        $company->user()->save($user);
        foreach (range(1, 5) as $personalSkillsIndex) {
            $skill = PersonalSkill::orderByRaw('RAND()')->get()->first();
            if ($company->personalSkills()->where('id', '=', $skill->id)->count() == 0) {
                $company->personalSkills()->attach($skill);
            }
        }

        foreach ((range(1, 10)) as $index) {
            $user = User::create([
                'name' => $faker->company,
                'email' => $faker->unique()->email,
                'phone' => $faker->phoneNumber,
                'facebook' => $faker->url,
                'twitter' => $faker->url,
                'linkedin' => $faker->url,
                'address' => $faker->streetAddress,
                'postal_code' => $faker->postcode,
                'city' => $faker->city,
                'country' => array_keys(User::$countries)[rand(0, sizeof(array_keys(User::$countries)) - 1)],
            ]);
            $user->verified = true;
            $user->visible = rand(0, 1) == 1 ? true : false;
            $user->is_filled = true;

            $user->save();
            Bouncer::assign('company')->to($user);

            $company = Company::create([
                'fiscal_id' => $faker->randomNumber(8),
                'overseer' => $faker->unique()->name,
                'website' => $faker->url,
                'talent' => $faker->sentence,
                'notification_email' => $faker->unique()->email,
                'notification_name' => $faker->company,
                'activity' => Company::$activities[rand(0, sizeof(Company::$activities) -1)]
            ]);

            $company->user()->save($user);
        }
    }
}
