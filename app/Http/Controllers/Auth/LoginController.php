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

        $guest = \App\SecretIds::where('secret_id', $request->secretCode)->with('owner')->first();

        if ($guest->owner_id && $guest->owner_type == "App\Student") {
            return redirect('/login');
        }

        if (!$guest->owner_id && $guest->owner_type == "App\Student") {
            return redirect('/register');
        }

        if ($guest->owner_id && $guest->owner_type == "App\Instructor") {
            return redirect('instructor/login');
        }

        if (!$guest->owner_id && $guest->owner_type == "App\Instructor") {
            return redirect('instructor/register');
        }
    }
}
