<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;
    public static $activities = ['administration', 'architecture-amp-construction', 'art-amp-culture', 'banking-and-or-finance-amp-insurance', 'business-amp-consulting', 'communication-amp-media-amp-pr', 'consumer-goods', 'customer-service', 'design', 'education-amp-training', 'engineering', 'hospitality-amp-tourism', 'human-resources', 'it-amp-web', 'legal', 'logistics', 'manufacturing', 'marketing-amp-advertising', 'medicine-amp-pharmaceutics', 'politics', 'quality-assurance-amp-safety', 'real-estate', 'research-amp-development', 'retail-amp-wholesale', 'sales', 'social-work', 'sport-and-or-health-amp-wellness', 'activity.technology-amp-telecommunications'];

    public static $rules = array(
            'overseer' => 'required',
            'fiscal_id' => 'required|unique:companies',
            'address' => 'required',
            'activity' => 'required',
    );

    public function user()
    {
        return $this->morphOne('\App\Models\User', 'userable');
    }

    public function professionalSkills()
    {
        return $this->belongsToMany('\App\Models\ProfessionalSkill');
    }
}
