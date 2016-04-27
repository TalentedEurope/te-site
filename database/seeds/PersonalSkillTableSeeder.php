<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PersonalSkill;

class PersonalSkillTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach ((range(1, 10)) as $index) {
            $skill = Personalskill::create([
                'name_en' => $faker->word,
                'name_sp' => $faker->word,
                'name_it' => $faker->word,
                'name_de' => $faker->word,
                'name_fr' => $faker->word
            ]);
        }
    }
}
