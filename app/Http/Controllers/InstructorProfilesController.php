<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\Student;
use App\Instructor;
use Illuminate\Http\Request;

class InstructorProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:web,instructor']);
    }

    public function index($id)
    {
        $instructor = Instructor::where('id', $id)->first();

        return view('profiles.instructor_profile', compact('instructor'));
    }

    public function edit()
    {
        if (Auth::guard('instructor')->check()) {
            $instructor = Instructor::where('id', Auth::user()->id)->first();
            return view('profiles.instructor_profile_edit', compact('instructor'));
        } else {
            return redirect('/home');
        }
    }

    public function update(Request $request)
    {
        if($request->hasFile('avatar')) {
            if(Auth::user()->avatar !== 'public/defaults/avatars/male.png' && Auth::user()->avatar !== 'public/defaults/avatars/female.png') {
                $lastavatar = Auth::user()->avatar;
                Storage::delete($lastavatar);

                Auth::user()->update([
                    'avatar' => $request->avatar->store('public/uploads/avatars')
                ]);

                $request->session()->flash('success', 'Profile picture updated!');
                return redirect(route('instructor.profile', ['id' => Auth::user()->id, 'slug' => Auth::user()->slug ]));
            } else {
                Auth::user()->update([
                    'avatar' => $request->avatar->store('public/uploads/avatars')
                ]);
                $request->session()->flash('success', 'Profile picture updated!');
                return redirect(route('instructor.profile', ['id' => Auth::user()->id, 'slug' => Auth::user()->slug ]));
            }
        }

        $this->validate($request, [
            'about' => 'max:140',
        ]);

        if($request->has('about')){
            if($request->about !== Auth::user()->profile->about) {
                Auth::user()->profile->update([
                    'about' => $request->about
                ]);
            }
        }

        $request->session()->flash('success', 'Your profile was updated succesfully!');
        return redirect(route('instructor.profile', ['id' => Auth::user()->id, 'slug' => Auth::user()->slug ]));
    }

}
