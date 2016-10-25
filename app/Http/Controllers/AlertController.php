<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Api\LoginController;

class AlertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAlerts(Request $request)
    {
        if (!Auth::user()->isA('company')) {
            App::abort(403, 'Unauthorized action.');
        }
        $data = array('token' => LoginController::userToken());
        return view('company.alerts', $data);
    }
}
