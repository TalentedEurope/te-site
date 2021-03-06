<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AlertController as SiteAlertController;
use App\Models\Student;
use App\Models\Company;
use App\Models\User;
use App\Models\Alert;
use App\Models\StudentStudy;
use App\Notifications\CompanyAlerted;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\MessageBag;
use Validator;
use Illuminate\Validation\Rule;
use Response;
use Image;
use Config;
use App;

class AlertController extends SiteAlertController
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function index(Request $request)
    {
        $user = Auth::User();
        if (!$user->isA('company')) {
            App::abort(403, 'Unauthorized action.');
        }
        $alerts = array();
        $results = Alert::where('target_id', $user->id)->paginate(env('PAGINATE_ENTRIES', 10));
        Carbon::setLocale(Config::get('app.locale'));

        foreach ($results as $item) {
            // Just in case since the current version of the api
            // is tailored to student->company.
            if ($item->origin->userable_type != Student::class) {
                continue;
            }
            $studyLevel = "";
            if ($item->origin->userable->studies && $item->origin->userable->studies->first()) {
                $studyLevel = trans('reg-profile.' . $item->origin->userable->studies->first()->level);
            }
            $alerts[] = array(
                'id' => $item->id,
                'student' => $item->origin->fullName,
                'country' => User::$countries[$item->origin->country],
                'slug' => $item->origin->fullName,
                'user_id' => $item->origin->id,
                'slug' => $item->origin->slug,
                'study_level' => $studyLevel,
                'when_alert' => $item->created_at->format('d-m-Y: h:i:s A'),
                'when_alert_relative' => $item->created_at->diffForHumans(),
            );
            // Update its timestamp
            $item->touch();
        }
        return array(
            'data' => $alerts,
            'per_page' => $results->perPage(),
            'total' => $results->total(),
            'current_page' => $results->currentPage(),
            'prev_page_url' => $results->previousPageUrl(),
            'next_page_url' => $results->nextPageUrl(),
        );
    }

    public function destroy(Request $request, $id)
    {
        $user = Auth::User();
        if (!$user->isA('company')) {
            return Response::json([], 404);
        }
        $alert = Alert::find($id);
        $alert->delete();
        return $alert;
    }

    public function store(Request $request)
    {
        $user = Auth::User();
        $errors = array();
        if (!$user->isA('student')) {
            return Response::json([], 404);
        }
        $v = Validator::make($request->all(), [
            'company' => [
                'required',
                Rule::exists('users', 'id')->where(function ($query) {
                    $query->where('userable_type', Company::class);
                }),
            ],
        ]);
        if ($v->passes()) {
            if (!$user->is_filled) {
                return Response::json(trans('reg-profile.cant_send_alerts_until_you_fill_the_profile'), 403);
            }
            if (!Alert::isAllowed($user->id, $request->input('company'))) {
                return Response::json(trans('api.'.'too_many_requests'), 429);
            }
            $company = User::find($request->input('company'));
            $company->notify(new CompanyAlerted($company, $user));

            // Todo Should i make it more Laravelish
            // and lose performance?
            $alert = new Alert();
            $alert->origin_id = $user->id;
            $alert->target_id = $request->input('company');
            $alert->save();



            return Response::json($alert, 200);
        }
        return Response::json($v->errors(), 404);
    }
}
