<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Sofa\Eloquence\Eloquence;

class Company extends Model
{
    use Eloquence;

    public $timestamps = false;
    public static $activities = ['administration', 'architecture-amp-construction', 'art-amp-culture', 'banking-and-or-finance-amp-insurance', 'business-amp-consulting', 'communication-amp-media-amp-pr', 'consumer-goods', 'customer-service', 'design', 'education-amp-training', 'engineering', 'hospitality-amp-tourism', 'human-resources', 'it-amp-web', 'legal', 'logistics', 'manufacturing', 'marketing-amp-advertising', 'medicine-amp-pharmaceutics', 'politics', 'quality-assurance-amp-safety', 'real-estate', 'research-amp-development', 'retail-amp-wholesale', 'sales', 'social-work', 'sport-and-or-health-amp-wellness', 'technology-amp-telecommunications'];


    public static function rules($company, $keyOnly = false)
    {
        $filter = array( 'fiscal_id' => ['sometimes','alpha_dash', Rule::unique('companies')->ignore($company->id)] ,
                        'overseer' => 'regex:/^[\pL\s\-\,\.]+$/u' ,
                        'activity' => 'sometimes|required|in:'.implode(',', Company::$activities),
                        'website' => 'active_url' ,
                        'talent' => 'sometimes|required|max:300',
                        'notification_name' => 'regex:/^[\pL\s\-\,\.]+$/u',
                        'notification_email' => 'email'
        );

        if ($keyOnly) {
            return array($keyOnly => $filter[$keyOnly]);
        } else {
            return $filter;
        }
    }

    public static function rulesRelated($related, $keyOnly = false)
    {
        $relatedRules = array(
            'personalSkills' => array(
                'personalSkills' => 'array|max:6'
            ),
        );
        $filter = $relatedRules[$related];
        if ($keyOnly) {
            return array($keyOnly => $filter[$keyOnly]);
        } else {
            return $filter;
        }
    }

    public static function niceNames()
    {
        $niceNames = array(
            'visible' => trans('reg-profile.profile_visibility'),
            'notify_me' => trans('reg-profile.notifications'),
            'name' => trans('reg-profile.name'),
            'phone' => trans('reg-profile.phone'),
            'fiscal_id' => trans('reg-profile.fiscal_id'),
            'overseer' => trans('reg-profile.company_representative'),
            'activity' => trans('reg-profile.company_activity'),
            'website' => trans('reg-profile.web_url'),
            'address' => trans('reg-profile.address'),
            'postal_code' => trans('reg-profile.postal_code'),
            'city' => trans('reg-profile.city'),
            'country' => trans('reg-profile.country'),
            'talent' => '"' . trans('reg-profile.company_what_is_talent') . '" ' . trans('reg-profile.field'),
            'contact_name' => trans('reg-profile.company_contact_person_name'),
            'contact_email' => trans('reg-profile.company_contact_person_email')
        );
        return $niceNames;
    }


    public static function getRandomTalent()
    {
        return \App\Models\Company::where("talent", "!=", "")->whereRaw('LENGTH(talent) > 50')->inRandomOrder()->limit(1)->first();
    }

    public static function getRandom()
    {
        $items = \App\Models\User::where('userable_type', \App\Models\Company::class)->where('visible', 1)->inRandomOrder()->where('image', '!=', '')->limit(18)->select('userable_id')->get()->map(function ($item, $key) {
            return $item->userable_id;
        })->toArray();
        return \App\Models\Company::whereIn('id', $items)->get();
    }

    public function user()
    {
        return $this->morphOne('\App\Models\User', 'userable');
    }

    public function personalSkills()
    {
        return $this->belongsToMany('\App\Models\PersonalSkill');
    }
}
