<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Bouncer;
use App;
use App\Models\User;
use App\Models\ValidatorInvite;
use App\Notifications\InstitutionRemoved;
use App\Notifications\InviteCreated;
use App\Notifications\ChangeInstitution;
use Response;
use Validator;

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
        $sent = ValidatorInvite::getSent(Auth::user()->userable);
        return view('institution.validators', array('sent' => $sent));
    }

    public function getJSONValidators(Request $request)
    {
        $this->institutionOnly();
        $validators = App\Models\Validator::where('institution_id', Auth::user()->userable->id)->with('user')->get();

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
                'Cannot invite, either this email is registered to another type of user or he already has an invitation pending from this institution'
            )
        );
        $v = Validator::make($request->all(), ValidatorInvite::rules());
        if ($v->passes()) {
            // Check if theres an user with that email
            $existingUser = User::where('email', $v->valid()['email'])->first();
            $vi = new ValidatorInvite();
            $vi->email = $v->valid()['email'];
            // Should be unique but let's check up collisions just in case.
            while (!$vi->uid) {
                $vi->uid = $this->makeUid();
                if (ValidatorInvite::where('uid', $vi->uid)->first()) {
                    $vi->uid = null;
                }
            }
            $vi->institution_id = Auth::user()->userable->id;
            $vi->save();
            if ($existingUser) {
                $existingUser->notify(new ChangeInstitution($vi, $existingUser));
            } else {
                $vi->notify(new InviteCreated($vi));
            }
            $request->session()->flash('success_message', sprintf('Sent invitation to %s', $v->valid()['email']));
            return back();
        }
        return back()->withInput()->withErrors($v->errors());
    }

    public function delete(Request $request, $id)
    {
        $val = \App\Models\Validator::find($id);
        if ($val && $val->institution == Auth::user()->userable) {
            $val->institution_id = null;
            $val->save();
            $val->user->notify(new InstitutionRemoved($val->user, Auth::user()->userable));
            return Response::json(trans('api.'.'success'), 200);
        }
        return Response::json(trans('api.'.'remove_cannot_find_validator'), 400);
    }

    public function deleteInvite(Request $request, $id)
    {
        $this->institutionOnly();
        $res = ValidatorInvite::where('id', $id)->where("institution_id", Auth::user()->userable->id)->delete();
        if ($res != 0) {
            $request->session()->flash('success_message', 'Deleted invitation successfully');
        }
        $request->session()->flash('error_message', 'Cannot find invitation to delete, please try again later');
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
            $user->password = $request->input('password');
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

            return view('auth.register-success', array('type' => 'validator'));
        } else {
            $errors = $v->errors()->merge($vv);
            return back()->withErrors($errors);
        }
        return view('validator.invite-error');
    }
}
