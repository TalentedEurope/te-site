<?php

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Company;
use App\Models\Alert;

class AlertsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(0, 100) as $index) {
            $alert = Alert::create([
                'origin_id' => Student::all()->random(1)->user->id,
                'target_id' => Company::all()->random(1)->user->id,
            ]);
        }
    }
}
