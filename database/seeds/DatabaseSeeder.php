<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call(BouncerTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(InstitutionsTableSeeder::class);
        $this->call(ValidatorsTableSeeder::class);
        $this->call(PersonalSkillTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(AlertsTableSeeder::class);
    }
}
