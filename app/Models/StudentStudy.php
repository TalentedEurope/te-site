<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentStudy extends Model
{
    public static $rules = array(
            'name' => 'required',
            'level' => 'required',
            'certificate' => 'required',
            'student_id' => 'required',
    );

    public static $levels = ['studies_level_5', 'studies_level_6', 'studies_level_7', 'studies_level_8'];
    public static $fields = ['fashion-clothing', 'business-studies-and-or-management-science', 'engineering-and-or-technology', 'social-sciences', 'languages-and-philological-sciences', 'communication-and-information-sciences', 'humanities', 'education-and-or-teacher-training', 'law', 'art-and-design', 'architecture-and-or-urban-and-regional-planning', 'natural-sciences', 'mathematics-and-or-informatics', 'medical-sciences', 'geography-and-or-geology', 'agriculture-sciences'];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
}
