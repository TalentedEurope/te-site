<?php

namespace App\Http\Controllers\Auth;

use Bouncer;
use App\Models\User;
use App\Models\Institution;
use App\Models\Student;
use Auth;
use App\Models\Company;
use App\Models\ValidationRequest;
use App\Models\ValidatorInvite;
use App\Notifications\AccountActivated;
use App\Notifications\NewAccount;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidatorController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Password;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Validator;
use Socialite;

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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
        $data = array();
        if ($request->has('req_id')) {
            $req = ValidationRequest::find($request->input('req_id'));
            if ($req && !$req->institution_id) {
                $data['request'] = $req;
            }
        }
        return view('auth.register', $data);
    }

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
        $this->middleware('guest', ['except' => ['getVerification', 'getVerificationError', 'getSetup', 'postSetup']]);
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
        $val = Validator::make($data, [
            'name' => 'required_if:type,institution',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'type' => 'required|in:company,validator,institution,student',
            'terms' => 'required',
            'institution_name' => 'required_if:invite_institution,invite',
            'institution_email' => 'required_if:invite_institution,invite|unique:users,email'
        ]);
        $val->setAttributeNames(User::niceNames());
        return $val;
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

        $request->session()->flash('reg-success', true);
        $request->session()->flash('reg-data', $data);

        return redirect()->route('get_success');
    }


    public function getSuccess(Request $request)
    {
        if ($request->session()->get('reg-success')) {
            $data = $request->session()->get('reg-data');
            return view('auth.register-success', $data);
        }
        return redirect()->route('register');
    }


    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        } else {
            $authUser = User::where('email', $user->email)->first();
            if ($authUser) {
                $authUser->provider_id = $user->id;
                $authUser->save();
                return $authUser;
            }
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'verified' => true
        ]);
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
        $user = null;

        if (!Auth::user()) {
            $user = User::create([
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
        } else {
            $user = Auth::user();
        }

        switch ($data['type']) {
            case 'student':
            case 'students':
                $student = Student::create();
                $student->user()->save($user);
                Bouncer::assign('student')->to($user);
                break;
            case 'company':
            case 'companies':
                $company = Company::create();
                $company->user()->save($user);
                Bouncer::assign('company')->to($user);
                break;
            case 'institution':
            case 'institutions':
                $user->name = $data['name'];
                $user->save();
                $institution = Institution::create();
                $institution->user()->save($user);
                Bouncer::assign('institution')->to($user);
                if (isset($data['req_id'])) {
                    $req = ValidationRequest::find($data['req_id']);
                    if ($req && !$req->institution_id) {
                        $vi = app('App\Http\Controllers\ValidatorController')->addValidator($req->validator_email, $institution->id);
                        $req->institution_id = $institution->id;
                        $req->save();
                    }
                }
                break;
            case 'validator':
            case 'validators':
                $user->name = $data['name'];
                $user->surname = $data['surname'];
                $user->save();
                $validator = \App\Models\Validator::create();
                $silent = false;
                if (!isset($data['institution_email']) || $data['institution_email'] == "") {
                    $u = User::where('userable_type', Institution::class)->where('name', 'like', '%' . $data['institution'] . '%')->first();
                    if ($u) $i = $u->userable;
                } else {
                    $insUser = User::create([
                        'email' => $data['institution_email'],
                        'password' => bcrypt(substr(str_shuffle(MD5(microtime())), 0, 10)),
                    ]);
                    $insUser->verified = 1;
                    $insUser->name = $data['institution_name'];
                    $token = Password::getRepository()->create($insUser);
                    $insUser->notify(new NewAccount($token, $insUser->email));
                    $insUser->save();
                    $i = Institution::create();
                    $i->user()->save($insUser);
                    Bouncer::assign('institution')->to($insUser);
                    $silent = true;
                }

                $validator->user()->save($user);
                Bouncer::assign('validator')->to($user);
                $vi = app('App\Http\Controllers\ValidatorController')->addValidator($user->email, $i->id, true, $silent);
        }
        if ($user->verified != true) {
            UserVerification::generate($user);
            $user->notify(new AccountActivated($user));
        }

        return $user;
    }

    public function getSetup(Request $request)
    {
        return view('auth.setup');
    }

    public function postSetup(Request $request)
    {
        $val = Validator::make($request->all(), [
            'type' => 'required',
            'terms' => 'required'
        ]);

        $val->validate();

        event(new Registered($user = $this->create($request->all())));
        $data = $request->all();

        return view('auth.register-success', $data);
    }
}
