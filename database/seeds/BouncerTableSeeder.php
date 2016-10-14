<?php

use Illuminate\Database\Seeder;

class BouncerTableSeeder extends Seeder
{
    public function run()
    {
        Bouncer::role()->create([
            'name' => 'student',
        ]);
        Bouncer::role()->create([
            'name' => 'company',
        ]);
        Bouncer::role()->create([
            'name' => 'institution',
        ]);
        Bouncer::role()->create([
            'name' => 'validator',
        ]);
    }
}
