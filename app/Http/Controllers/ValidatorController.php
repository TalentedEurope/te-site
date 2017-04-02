<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Bouncer;
use App;
use App\Models\User;
use App\Models\Institution;
use App\Models\ValidatorInvite;
use App\Models\ValidationRequest;
use App\Notifications\InstitutionRemoved;
use App\Notifications\InviteCreated;
use App\Notifications\ChangeInstitution;
use Validator;
use Response;

class ValidatorController extends Controller
{
    // change this to a middleware?
    private function institutionOnly()
    {
        if (!Auth::user() || !Auth::user()->isA('institution')) {
            App::abort(403, 'Unauthorized action.');
        }
    }

    public function index(Request $request)
    {
        $this->institutionOnly();
        $user = Auth::user();
        $sent = ValidatorInvite::getSent($user->userable);
        $data = array('sent' => $sent);
        if (!$user->is_filled) {
            $errors = Validator::make($user->toArray(), User::Rules(false, true));
                $filledVal = Validator::make($user->userable->toArray(), Institution::Rules($user->userable, false, true));
                $filledVal->setAttributeNames(Institution::niceNames());
                $errors->errors()->merge($filledVal);
                $data['profileErrors'] = $errors->errors();
        }

        return view('institution.validators', $data);
    }

    public function getJSONValidators(Request $request)
    {
        $this->institutionOnly();
        $validators = App\Models\Validator::where('institution_id', Auth::user()->userable->id)->whereHas('user')->with('user')->get();

        $res = array();
        foreach ($validators as $validator) {
            $item = array(
                'id' => $validator->id,
                'full_name' => $validator->user->fullName,
                'email' => $validator->user->email,
                'department' => $validator->department,
                'position' => $validator->position,
                'active' => $validator->enabled,
                'delete_url' => route('delete_validator', $validator->id)
            );
            $res[] = $item;
        }
        return $res;
    }

    public function getInstitutions($countryCode)
    {
        $institutionsIds = Institution::whereHas('user', function ($query) use ($countryCode) {
                    $query->where('country', $countryCode);
        })->join('validators', 'validators.institution_id', '=', 'institutions.id')->where('validators.enabled', 1)->select('institutions.id')->get();

        $institutions = Institution::whereIn('id', $institutionsIds)->get();
        return $institutions->map(
            function ($institution) {
                return ['id' => $institution->id,
                        'name' => $institution->user->name
                ];
            }
        );
    }

    public function getInstitutionValidators($id)
    {

        $validators = \App\Models\Validator::where('institution_id', 1)->where('enabled', 1)->whereHas('user', function ($q) {
            $q->where('is_filled', '=', 1);
        })->get();

        $validators = \App\Models\Validator::where('institution_id', $id)->whereHas('user')->get();
        return $validators->map(
            function ($validator) {
                if ($validator->user) {
                    return ['id' => $validator->id,
                            'name' => $validator->user->fullName,
                            'department' => $validator->department,
                            'position' => $validator->position];
                }
            }
        );
    }

    // Should be in a helper or something
    function makeUid($yourTimestamp = null)
    {
        static $inc = 0;
        $id = '';

        if ($yourTimestamp === null) {
            $yourTimestamp = time();
        }
        $ts = pack('N', $yourTimestamp);
        $m = substr(md5(gethostname()), 0, 3);
        $pid = pack('n', posix_getpid());
        $trail = substr(pack('N', $inc++), 1, 3);
        $bin = sprintf("%s%s%s%s", $ts, $m, $pid, $trail);

        for ($i = 0; $i < 12; $i++) {
            $id .= sprintf("%02X", ord($bin[$i]));
        }

        return $id;
    }

    public function add(Request $request)
    {
        $this->institutionOnly();
        Validator::extend(
            'can_be_validator',
            function ($attribute, $value, $parameters, $validator) {
                $exists = User::where('email', $value)->first();
                if ($exists && $exists->userable_type != \App\Models\Validator::class) {
                    return false;
                }
                if (ValidatorInvite::where('email', $value)->where('institution_id', Auth::user()->userable->id)->first()) {
                    return false;
                }

                return true;
            },
            array(
                trans('validators.cannot_invite')
            )
        );
        $v = Validator::make($request->all(), ValidatorInvite::rules());
        if ($v->passes()) {
            $this->addValidator($v->valid()['email'], Auth::user()->userable->id);
            $request->session()->flash('success_message', sprintf(trans('validators.send_invitation_to'), $v->valid()['email']));
            return back();
        } else {
            return back()->withInput()->withErrors($v->errors());
        }
    }

    public function addValidator($email, $institution_id)
    {
        $existingUser = User::where('email', $email)->first();
        $vi = new ValidatorInvite();
        $vi->email = $email;
        // Should be unique but let's check up collisions just in case.
        while (!$vi->uid) {
            $vi->uid = $this->makeUid();
            if (ValidatorInvite::where('uid', $vi->uid)->first()) {
                $vi->uid = null;
            }
        }
        $vi->institution_id = $institution_id;
        $vi->save();
        if ($existingUser) {
            $existingUser->notify(new ChangeInstitution($vi, $existingUser));
        } else {
            $vi->notify(new InviteCreated($vi));
        }
        return $vi;
    }

    public function delete(Request $request, $id)
    {
        $val = \App\Models\Validator::find($id);
        if ($val && $val->institution == Auth::user()->userable) {
            $val->institution_id = null;
            $val->save();
            $val->user->notify(new InstitutionRemoved($val->user, Auth::user()->userable));
            return Response::json($val, 200);
        }
        return Response::json(trans('validators.cannot_find_user'), 404);
    }


    public function deleteInvite(Request $request, $id)
    {
        $this->institutionOnly();
        $res = ValidatorInvite::where('id', $id)->where("institution_id", Auth::user()->userable->id)->delete();
        if ($res != 0) {
            $request->session()->flash('success_message', trans('validators.deleted_invitation_successfully'));
        } else {
            $request->session()->flash('error_message', trans('validators.cannot_find_invitation_to_delete'));
        }
        return back();
    }

    public function toggleStatus(Request $request, $id)
    {
        $this->institutionOnly();
        $validator = App\Models\Validator::where('institution_id', Auth::user()->userable->id)->where('id', $id)->firstOrFail();
        $validator->enabled = !$validator->enabled;
        $validator->save();
        return $validator;
    }

    public function changeInstitution(Request $request, $uid)
    {
        $email = $request->input('email');
        // Check if the request exists and act if it does, otherwise
        // throw an error
        $inv = ValidatorInvite::where('email', $email)->where('uid', $uid)->first();
        if ($inv) {
            $user = User::where('email', $email)->first();
            $user->userable->institution_id = $inv->institution_id;
            $user->userable->save();
            $inv->delete();
            return view('validator.changed-institution', array('institution' => $user->userable->institution->user->name ));
        }
        return view('validator.change-institution-error');
    }

    public function getRegister(Request $request, $uid)
    {
        $email = $request->input('email');
        $inv = ValidatorInvite::where('email', $email)->where('uid', $uid)->first();
        if ($inv) {
            return view('auth.register-validator', array('invite' => $inv, 'email' => $email));
        }
        return view('validator.invite-error');
    }

    public function postRegister(Request $request, $uid)
    {
        $email = $request->input('email');
        $inv = ValidatorInvite::where('email', $email)->where('uid', $uid)->first();
        $v = Validator::make($request->all(), User::rules());
        $vv = Validator::make($request->all(), \App\Models\Validator::rules());
        if ($inv && $v->passes() && $vv->passes()) {
            $user = new User();
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->name = $request->input('name');
            $user->surname = $request->input('surname');
            $user->verified = 1;
            $user->save();
            $validator = \App\Models\Validator::create(array(
                'department' => $request->input('department'),
                'position' => $request->input('position')
            ));
            $validator->user()->save($user);
            Bouncer::assign('validator')->to($user);
            $validator->institution_id = $inv->institution_id;
            $validator->save();
            $inv->delete();

            $requests = ValidationRequest::where("validator_email", $user->email)->get();
            foreach ($requests as $req) {
                $req->validator_id = $validator->id;
                $req->save();
            }

            return view('auth.register-success', array('type' => 'validator'));
        } else {
            $errors = $v->errors()->merge($vv);
            return back()->withErrors($errors);
        }
        return view('validator.invite-error');
    }
}
