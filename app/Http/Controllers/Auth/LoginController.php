<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    use VerifiesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm(Request $request)
    {
        if ($request->has('success')) {
            $request->session()->flash('success_message', 'Account activation was successful, you may log in now');

            return redirect('/login');
        }

        return view('auth.login');
    }

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        Validator::extend('verified', function ($attribute, $value, $parameters, $validator) {
            $user = User::where('email', $value)->first();
            if ($user && $user->verified == 0) {
                UserVerification::generate($user);
                UserVerification::send(
                    $user,
                    'Registration confirmation at Talented Europe',
                    env('MAIL_ADDRESS', 'noreply@talentedeurope.eu'),
                    env('MAIL_NAME', 'Talented Europe')
                );

                return false;
            }

            return true;
        });
    }

    /**
     * Validate the user login request.
     *
     * @param \Illuminate\Http\Request $request
     */
    protected function validateLogin(Request $request)
    {
        $messages = array($this->username().'.verified' => 'Email has not been verified, we have sent you the verification email again. Please verify your email and try to log in again');

        $this->validate($request, [
            $this->username() => 'required|verified', 'password' => 'required',
        ], $messages);
    }
}
