<?php

namespace App\Http\Controllers\Auth;

use Bouncer;
use App\Models\User;
use App\Models\Institution;
use App\Models\Student;
use App\Models\Company;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use VerifiesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    protected $redirectIfVerified = '/login';
    protected $redirectAfterVerification = '/login?success=true';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getVerification', 'getVerificationError']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'type' => 'required',
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $data = $request->all();

        return view('auth.register-success', $data);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        UserVerification::generate($user);
        UserVerification::send(
            $user,
            'Registration confirmation at Talented Europe',
            env('MAIL_ADDRESS', 'noreply@talentedeurope.eu'),
            env('MAIL_NAME', 'Talented Europe')
        );

        switch ($data['type']) {
            case 'student':
                $student = Student::create();
                $student->user()->save($user);
                Bouncer::assign('student')->to($user);
                break;
            case 'company':
                $company = Company::create();
                $company->user()->save($user);
                Bouncer::assign('company')->to($user);
                break;
            case 'institution':
                $institution = Institution::create();
                $institution->user()->save($user);
                Bouncer::assign('institution')->to($user);
                break;
        }

        return $user;
    }
}
