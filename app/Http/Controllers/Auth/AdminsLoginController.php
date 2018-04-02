<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class AdminsLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web');
        $this->middleware('guest:admin');
        $this->middleware('guest:instructor');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $request->session()->flash('success', 'You are successfully logged in!');
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()
        ->withInput($request->only('email', 'remember'))
        ->withErrors([
            'email' => Lang::get('auth.failed'),
        ]);
    }
}
