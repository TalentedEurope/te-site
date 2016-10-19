<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;
    public static $activities = ['activity.administration', 'activity.architecture-amp-construction', 'activity.art-amp-culture', 'activity.banking-and-or-finance-amp-insurance', 'activity.business-amp-consulting', 'activity.communication-amp-media-amp-pr', 'activity.consumer-goods', 'activity.customer-service', 'activity.design', 'activity.education-amp-training', 'activity.engineering', 'activity.hospitality-amp-tourism', 'activity.human-resources', 'activity.it-amp-web', 'activity.legal', 'activity.logistics', 'activity.manufacturing', 'activity.marketing-amp-advertising', 'activity.medicine-amp-pharmaceutics', 'activity.politics', 'activity.quality-assurance-amp-safety', 'activity.real-estate', 'activity.research-amp-development', 'activity.retail-amp-wholesale', 'activity.sales', 'activity.social-work', 'activity.sport-and-or-health-amp-wellness', 'activity.technology-amp-telecommunications'];

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
