<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    protected $redirectTo = '/home';

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function determineLoginType(Request $request)
    {

        $guestID = \App\SecretIds::where('secret_id', $request->secretCode)->with('owner')->first();

        if ($guestID->owner_id && $guestID->owner_type == "App\Student") {
            return redirect('/login');
        }

        if (!$guestID->owner_id && $guestID->owner_type == "App\Student") {
            return redirect('/register');
        }

        if ($guestID->owner_id && $guestID->owner_type == "App\Instructor") {
            return redirect('instructor/login');
        }

        if (!$guestID->owner_id && $guestID->owner_type == "App\Instructor") {
            return redirect('instructor/register');
        }
    }
}
