<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Auth;

class ProfessionalSkill extends Model
{
    use Eloquence;

    public $timestamps = false;

    protected $fillable = ['name','language_code'];

    protected $primaryKey = 'id';

    public static $rules = array(
            'name' => 'required|unique:professional_skills',
            'language_code' => 'required',
    );

    public function students()
    {
        return $this->belongsToMany('\App\Models\Student');
    }
}
