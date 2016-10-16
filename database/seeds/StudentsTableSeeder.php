<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Institution;
use App\Models\Student;
use App\Models\StudentExperience;
use App\Models\StudentStudy;
use App\Models\StudentLanguage;
use App\Models\ValidationRequest;
use App\Models\KnowledgeSkill;
use App\Models\PersonalSkill;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $institutions = Institution::all();

        //Let's create an empty stdent:
        $user = User::create([
            'email' => 'test@student',
        ]);
        Bouncer::assign('student')->to($user);
        $user->password = Hash::make('secret');
        $user->save();

        foreach ($institutions as $institution) {
            foreach ((range(1, 3)) as $index) {
                $user = User::create([
                    'name' => $faker->unique()->name,
                    'email' => $faker->unique()->email,
                ]);
                Bouncer::assign('student')->to($user);
                $student = Student::create([
                    'address' => $faker->address,
                    'nationality' => Institution::$countries[
                                   rand(0, sizeOf(Institution::$countries) - 1)
                                 ],
                    'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
                    'institution_id' => $institution->id,
                    'valid' => false,
                    'curriculum' => '/uploads/curriculum/sample.pdf',
                    'photo' => '/uploads/curriculum/sample.jpg',
                    'renewed_at' => date('Y-m-d'),
                ]);

                // Student studies.
                foreach (range(1, rand(2, 5)) as $studiesIndex) {
                    $study = StudentStudy::create([
                        'name' => $faker->sentence(6, true),
                        'level' => StudentStudy::$levels[
                            rand(0, sizeOf(StudentStudy::$levels) - 1)
                        ],
                        'student_id' => $student->id,
                        'certificate' => '/uploads/certificate/sample.pdf',
                        'gradecard' => '/uploads/gradecard/sample.pdf',
                    ]);
                }
                $student->user()->save($user);

                // Student languages
                foreach (range(1, rand(2, 3)) as $languagesIndex) {
                    $study = StudentLanguage::create([
                        'name' => $faker->word,
                        'level' => StudentLanguage::$levels[
                            rand(0, sizeOf(StudentLanguage::$levels) - 1)
                        ],
                        'student_id' => $student->id,
                        'certificate' => '/uploads/certificate/sample.pdf',
                        'first_language' => rand(0, 1) == 1 ? true : false,
                    ]);
                }
                $student->user()->save($user);

                // Student experience
                foreach (range(1, 2) as $languagesIndex) {
                    $study = StudentExperience::create([
                        'company' => $faker->company,
                        'from' => $faker->dateTimeThisCentury->format('Y-m-d'),
                        'until' => $languagesIndex % 2 == 0 ? $faker->dateTimeThisCentury->format('Y-m-d') : '',
                        'student_id' => $student->id,
                    ]);
                }

                // Student knowledge skills
                foreach (range(1, 5) as $knowledgeSkillsIndex) {
                    $skillName = $faker->word;
                    $skill = KnowledgeSkill::firstOrCreate(array('name' => $skillName));
                    if ($student->knowledgeSkills()->where('name', '=', $skillName)->count() == 0) {
                        $student->knowledgeSkills()->attach($skill);
                    }
                }

                // Student personal skills
                foreach (range(1, 5) as $personalSkillsIndex) {
                    $skill = PersonalSkill::orderByRaw('RAND()')->get()->first();
                    if ($student->personalSkills()->where('id', '=', $skill->id)->count() == 0) {
                        $student->personalSkills()->attach($skill);
                    }
                }

                // Validation requests, some of them with a existing validator, and with a new validator
                if (rand(0, 1) % 2 == 0) {
                    $request = ValidationRequest::create([
                        'student_id' => $student->id,
                        'validator_name' => $faker->name(),
                        'validator_email' => $faker->email(),
                    ]);
                } else {
                    $request = ValidationRequest::create([
                        'student_id' => $student->id,
                        'validator_id' => $institution->validators()->orderByRaw('RAND()')->get()->first()->id,
                    ]);
                }
            }
        }
    }
}
