<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use JWTAuth;
use Auth;

class LoginController extends Controller
{
    public function getToken(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            } else if (!Auth::user()->verified) {
                return response()->json(['error' => 'email_not_verified'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        // if no errors are encountered we can return a JWT
        $data = compact('token');
        $user = Auth::user();
        $data['user'] = $user;
        if ($user && $request->has('pushID')) {
            $user->push_id = $request->input('pushID');
            $user->save();
        }
        return response()->json($data);
    }

    public static function userToken()
    {
        $token = '';
        if (Auth::user()) {
            $token = JWTAuth::fromUser(Auth::user());
        }
        return $token;
    }
}
