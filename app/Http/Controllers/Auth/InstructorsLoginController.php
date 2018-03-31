<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class InstructorsLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest:instructor,web']);
    }

    public function showLoginForm()
    {
        return view('auth.instructor-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::guard('instructor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $request->session()->flash('success', 'You are successfully logged in!');
            return redirect()->intended(route('instructor.dashboard'));
        }

        return redirect()->back()
        ->withInput($request->only('email', 'remember'))
        ->withErrors([
            'email' => Lang::get('auth.failed'),
        ]);
    }
}
