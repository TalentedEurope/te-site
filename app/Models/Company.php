<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Company extends Model
{
    public $timestamps = false;
    public static $activities = ['administration', 'architecture-amp-construction', 'art-amp-culture', 'banking-and-or-finance-amp-insurance', 'business-amp-consulting', 'communication-amp-media-amp-pr', 'consumer-goods', 'customer-service', 'design', 'education-amp-training', 'engineering', 'hospitality-amp-tourism', 'human-resources', 'it-amp-web', 'legal', 'logistics', 'manufacturing', 'marketing-amp-advertising', 'medicine-amp-pharmaceutics', 'politics', 'quality-assurance-amp-safety', 'real-estate', 'research-amp-development', 'retail-amp-wholesale', 'sales', 'social-work', 'sport-and-or-health-amp-wellness', 'activity.technology-amp-telecommunications'];


    public static function rules($company, $only_key = false)
    {
        $filter = array( 'fiscal_id' => ['required','alpha_dash', Rule::unique('companies')->ignore($company->id)] ,
                        'overseer' => 'regex:/^[\pL\s\-]+$/u' ,
                        'activity' => 'required|in:'.implode(',', Company::$activities),
                        'website' => 'active_url' ,
                        'talent' => 'required|max:300',
                        'notification_name' => 'regex:/^[\pL\s\-]+$/u',
                        'notification_email' => 'email'
        );

        if ($only_key) {
            return array($only_key => $filter[$only_key]);
        } else {
            return $filter;
        }
    }

    public static function rulesRelated($related, $only_key = false)
    {
        $relatedRules = array(
            'personalSkills' => array(
                'personalSkills' => 'array|max:6'
            ),
        );
        $filter = $relatedRules[$related];
        if ($only_key) {
            return array($only_key => $filter[$only_key]);
        } else {
            return $filter;
        }
    }


    public static $niceNames = array(
                        'fiscal_id' => 'Fiscal ID',
                        'overseer' => 'Person in charge',
                        'activity' => 'Activity Sector',
                        'website' => 'Website URL',
                        'talent' => '"What is talent for you?" field',
                        'contact_name' => 'Contact person name',
                        'contact_email' => 'Contact person email'
        );

    public function user()
    {
        return $this->morphOne('\App\Models\User', 'userable');
    }

    public function personalSkills()
    {
        return $this->belongsToMany('\App\Models\PersonalSkill');
    }
}
