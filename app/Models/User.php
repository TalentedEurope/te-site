<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Notifications\Notifiable;
use Sofa\Eloquence\Eloquence;
use Auth;

class User extends Authenticatable
{
    use HasRolesAndAbilities;
    use Notifiable;
    use Eloquence;

    protected $with = ['userable'];
    protected $appends = ['slug'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id', 'verified'
    ];

    public static $photoPath = '/uploads/photo/';

    public static $photoWidth = 500;
    public static $photoHeight = 238;

    public static $countries = array('AF' => 'Afghanistan', 'AX' => 'Åland Islands', 'AL' => 'Albania', 'DZ' => 'Algeria', 'AS' => 'American Samoa', 'AD' => 'Andorra', 'AO' => 'Angola', 'AI' => 'Anguilla', 'AQ' => 'Antarctica', 'AG' => 'Antigua and Barbuda', 'AR' => 'Argentina', 'AM' => 'Armenia', 'AW' => 'Aruba', 'AU' => 'Australia', 'AT' => 'Austria', 'AZ' => 'Azerbaijan', 'BS' => 'Bahamas', 'BH' => 'Bahrain', 'BD' => 'Bangladesh', 'BB' => 'Barbados', 'BY' => 'Belarus', 'BE' => 'Belgium', 'BZ' => 'Belize', 'BJ' => 'Benin', 'BM' => 'Bermuda', 'BT' => 'Bhutan', 'BO' => 'Bolivia (Plurinational State of)', 'BQ' => 'Bonaire, Sint Eustatius and Saba', 'BA' => 'Bosnia and Herzegovina', 'BW' => 'Botswana', 'BV' => 'Bouvet Island', 'BR' => 'Brazil', 'IO' => 'British Indian Ocean Territory', 'BN' => 'Brunei Darussalam', 'BG' => 'Bulgaria', 'BF' => 'Burkina Faso', 'BI' => 'Burundi', 'CV' => 'Cabo Verde', 'KH' => 'Cambodia', 'CM' => 'Cameroon', 'CA' => 'Canada', 'KY' => 'Cayman Islands', 'CF' => 'Central African Republic', 'TD' => 'Chad', 'CL' => 'Chile', 'CN' => 'China', 'CX' => 'Christmas Island', 'CC' => 'Cocos (Keeling) Islands', 'CO' => 'Colombia', 'KM' => 'Comoros', 'CG' => 'Congo', 'CD' => 'Congo (Democratic Republic of the)', 'CK' => 'Cook Islands', 'CR' => 'Costa Rica', 'CI' => "Côte d'Ivoire", 'HR' => 'Croatia', 'CU' => 'Cuba', 'CW' => 'Curaçao', 'CY' => 'Cyprus', 'CZ' => 'Czechia', 'DK' => 'Denmark', 'DJ' => 'Djibouti', 'DM' => 'Dominica', 'DO' => 'Dominican Republic', 'EC' => 'Ecuador', 'EG' => 'Egypt', 'SV' => 'El Salvador', 'GQ' => 'Equatorial Guinea', 'ER' => 'Eritrea', 'EE' => 'Estonia', 'ET' => 'Ethiopia', 'FK' => 'Falkland Islands (Malvinas)', 'FO' => 'Faroe Islands', 'FJ' => 'Fiji', 'FI' => 'Finland', 'FR' => 'France', 'GF' => 'French Guiana', 'PF' => 'French Polynesia', 'TF' => 'French Southern Territories', 'GA' => 'Gabon', 'GM' => 'Gambia', 'GE' => 'Georgia', 'DE' => 'Germany', 'GH' => 'Ghana', 'GI' => 'Gibraltar', 'GR' => 'Greece', 'GL' => 'Greenland', 'GD' => 'Grenada', 'GP' => 'Guadeloupe', 'GU' => 'Guam', 'GT' => 'Guatemala', 'GG' => 'Guernsey', 'GN' => 'Guinea', 'GW' => 'Guinea-Bissau', 'GY' => 'Guyana', 'HT' => 'Haiti', 'HM' => 'Heard Island and McDonald Islands', 'VA' => 'Holy See', 'HN' => 'Honduras', 'HK' => 'Hong Kong', 'HU' => 'Hungary', 'IS' => 'Iceland', 'IN' => 'India', 'ID' => 'Indonesia', 'IR' => 'Iran (Islamic Republic of)', 'IQ' => 'Iraq', 'IE' => 'Ireland', 'IM' => 'Isle of Man', 'IL' => 'Israel', 'IT' => 'Italy', 'JM' => 'Jamaica', 'JP' => 'Japan', 'JE' => 'Jersey', 'JO' => 'Jordan', 'KZ' => 'Kazakhstan', 'KE' => 'Kenya', 'KI' => 'Kiribati', 'KP' => "Korea (Democratic People's Republic of)", 'KR' => 'Korea (Republic of)', 'KW' => 'Kuwait', 'KG' => 'Kyrgyzstan', 'LA' => "Lao People's Democratic Republic", 'LV' => 'Latvia', 'LB' => 'Lebanon', 'LS' => 'Lesotho', 'LR' => 'Liberia', 'LY' => 'Libya', 'LI' => 'Liechtenstein', 'LT' => 'Lithuania', 'LU' => 'Luxembourg', 'MO' => 'Macao', 'MK' => 'Macedonia (the former Yugoslav Republic of)', 'MG' => 'Madagascar', 'MW' => 'Malawi', 'MY' => 'Malaysia', 'MV' => 'Maldives', 'ML' => 'Mali', 'MT' => 'Malta', 'MH' => 'Marshall Islands', 'MQ' => 'Martinique', 'MR' => 'Mauritania', 'MU' => 'Mauritius', 'YT' => 'Mayotte', 'MX' => 'Mexico', 'FM' => 'Micronesia (Federated States of)', 'MD' => 'Moldova (Republic of)', 'MC' => 'Monaco', 'MN' => 'Mongolia', 'ME' => 'Montenegro', 'MS' => 'Montserrat', 'MA' => 'Morocco', 'MZ' => 'Mozambique', 'MM' => 'Myanmar', 'NA' => 'Namibia', 'NR' => 'Nauru', 'NP' => 'Nepal', 'NL' => 'Netherlands', 'NC' => 'New Caledonia', 'NZ' => 'New Zealand', 'NI' => 'Nicaragua', 'NE' => 'Niger', 'NG' => 'Nigeria', 'NU' => 'Niue', 'NF' => 'Norfolk Island', 'MP' => 'Northern Mariana Islands', 'NO' => 'Norway', 'OM' => 'Oman', 'PK' => 'Pakistan', 'PW' => 'Palau', 'PS' => 'Palestine, State of', 'PA' => 'Panama', 'PG' => 'Papua New Guinea', 'PY' => 'Paraguay', 'PE' => 'Peru', 'PH' => 'Philippines', 'PN' => 'Pitcairn', 'PL' => 'Poland', 'PT' => 'Portugal', 'PR' => 'Puerto Rico', 'QA' => 'Qatar', 'RE' => 'Réunion', 'RO' => 'Romania', 'RU' => 'Russian Federation', 'RW' => 'Rwanda', 'BL' => 'Saint Barthélemy', 'SH' => 'Saint Helena, Ascension and Tristan da Cunha', 'KN' => 'Saint Kitts and Nevis', 'LC' => 'Saint Lucia', 'MF' => 'Saint Martin (French part)', 'PM' => 'Saint Pierre and Miquelon', 'VC' => 'Saint Vincent and the Grenadines', 'WS' => 'Samoa', 'SM' => 'San Marino', 'ST' => 'Sao Tome and Principe', 'SA' => 'Saudi Arabia', 'SN' => 'Senegal', 'RS' => 'Serbia', 'SC' => 'Seychelles', 'SL' => 'Sierra Leone', 'SG' => 'Singapore', 'SX' => 'Sint Maarten (Dutch part)', 'SK' => 'Slovakia', 'SI' => 'Slovenia', 'SB' => 'Solomon Islands', 'SO' => 'Somalia', 'ZA' => 'South Africa', 'GS' => 'South Georgia and the South Sandwich Islands', 'SS' => 'South Sudan', 'ES' => 'Spain', 'LK' => 'Sri Lanka', 'SD' => 'Sudan', 'SR' => 'Suriname', 'SJ' => 'Svalbard and Jan Mayen', 'SZ' => 'Swaziland', 'SE' => 'Sweden', 'CH' => 'Switzerland', 'SY' => 'Syrian Arab Republic', 'TW' => 'Taiwan, Province of China', 'TJ' => 'Tajikistan', 'TZ' => 'Tanzania, United Republic of', 'TH' => 'Thailand', 'TL' => 'Timor-Leste', 'TG' => 'Togo', 'TK' => 'Tokelau', 'TO' => 'Tonga', 'TT' => 'Trinidad and Tobago', 'TN' => 'Tunisia', 'TR' => 'Turkey', 'TM' => 'Turkmenistan', 'TC' => 'Turks and Caicos Islands', 'TV' => 'Tuvalu', 'UG' => 'Uganda', 'UA' => 'Ukraine', 'AE' => 'United Arab Emirates', 'GB' => 'United Kingdom of Great Britain and Northern Ireland', 'US' => 'United States of America', 'UM' => 'United States Minor Outlying Islands', 'UY' => 'Uruguay', 'UZ' => 'Uzbekistan', 'VU' => 'Vanuatu', 'VE' => 'Venezuela (Bolivarian Republic of)', 'VN' => 'Viet Nam', 'VG' => 'Virgin Islands (British)', 'VI' => 'Virgin Islands (U.S.)', 'WF' => 'Wallis and Futuna', 'EH' => 'Western Sahara', 'YE' => 'Yemen', 'ZM' => 'Zambia', 'ZW' => 'Zimbabwe');

    public static function rules($keyOnly = false, $forModelValidation = false, $user = false, $validatorProfile = false)
    {
        $filter = array( 'visible' => 'sometimes|required|boolean',
                        'notify_me' => 'sometimes|required|boolean',
                        'name' => 'sometimes|required',
                        'phone' => 'regex:/^[\pN\s\d\+\-\(\)\.]+$/u' ,
                        'facebook' => 'active_url' ,
                        'twitter' => 'active_url' ,
                        'linkedin' => 'active_url' ,
                        'address' => 'max:300',
                        'postal_code' => 'max:12',
                        'password' => 'sometimes|required|min:8|same:password_confirm',
                        'password_confirm' => 'sometimes|required|min:8|same:password',
                        'city' => 'sometimes|required',
                        'country' => 'sometimes|required|in:'.implode(',', array_keys(User::$countries)),
                        'image' => 'image'
        );

        if ($user && $user->isA('student')) {
            $filter['surname'] = 'sometimes|required';
        }

        if ($forModelValidation) {
            unset($filter["image"]);
            unset($filter["password"]);
            unset($filter["password_confirm"]);
        }

        if ($validatorProfile) {
            unset($filter["country"]);
            unset($filter["city"]);
        }

        if ($keyOnly) {
            return array($keyOnly => $filter[$keyOnly]);
        } else {
            return $filter;
        }
    }

    public static function niceNames()
    {
        $niceNames = array();
        if (Auth::user() && Auth::user()->isA('student')) {
            $niceNames = array(
                'visible' => trans('reg-profile.profile_visibility'),
                'notify_me' => trans('reg-profile.notifications'),
                'name' => trans('reg-profile.name'),
                'phone' => trans('reg-profile.phone'),
                'facebook' => trans('reg-profile.facebook_page_url'),
                'twitter' => trans('reg-profile.twitter_page_url'),
                'linkedin' => trans('reg-profile.linkedin_page_url'),
                'address' => trans('reg-profile.address'),
                'postal_code' => trans('reg-profile.postal_code'),
                'city' => trans('reg-profile.city'),
                'country' => trans('reg-profile.country'),
                'image' => trans('reg-profile.my_photo'),
            );
        } else {
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
                'contact_email' => trans('reg-profile.company_contact_person_email'),
                'password_confirm' => trans('reg-profile.password_confirm'),
                'terms' => "'" . trans('reg-profile.terms_of_use') . "'",
                'type' => trans('reg-profile.user_type'),
            );
        }
        return $niceNames;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getCityCoordinates()
    {
        return \App\Models\User::whereNotNull("users.city")->join('cities', function ($join) {
                $join->on('cities.country', '=', 'users.country');
                $join->on('cities.city', '=', "users.city");
        })->select('users.city', 'latitude', 'longitude') ->get();
    }

    public static function getCount($type)
    {
        return \App\Models\User::where('userable_type', $type)->where('is_filled', true)->where('visible', true) ->count();
    }

    public function getPhoto()
    {
        $route = User::$photoPath;
        if ($this->image) {
            $route .= $this->image;
        } else {
            $route .= 'default.png';
        }

        return $route;
    }

    public function getImageAttribute()
    {
        $image = $this->attributes['image'];
        if ($this->attributes['image'] == "") {
            $image = 'default.png';
        }
        return $image;
    }

    public function getFullNameAttribute()
    {
        return $this->attributes['name']  . ' ' . $this->attributes['surname'];
    }

    public function getSlug()
    {
        return str_slug($this->name.' '.$this->surname);
    }

    public function getSlugAttribute()
    {
        return $this->getSlug();
    }

    public function userable()
    {
        return $this->morphTo();
    }

    public function routeNotificationForOneSignal()
    {
        return $this->push_id;
    }
}
