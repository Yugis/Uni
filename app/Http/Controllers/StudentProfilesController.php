<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\Student;
use App\Instructor;
use Illuminate\Http\Request;

class StudentProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:web,instructor']);
    }

    public function index($id)
    {
        $student = Student::findOrFail($id);

        return view('profiles.student_profile', compact('student'));
    }

    public function edit()
    {
        if (Auth::guard('web')->check()) {
            $student = Auth::user();
            return view('profiles.student_profile_edit', compact('student'));
        } else {
            return redirect('/instructor');
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if($request->hasFile('avatar')) {
            if($user->avatar !== 'public/defaults/avatars/male.png' && $user->avatar !== 'public/defaults/avatars/female.png') {
                $lastavatar = $user->avatar;
                Storage::delete($lastavatar);

                $user->update([
                    'avatar' => $request->avatar->store('public/uploads/avatars')
                ]);
                return redirect(route('student.profile', ['id' => $user->id, 'slug' => $user->slug ]));
            } else {
                $user->update([
                    'avatar' => $request->avatar->store('public/uploads/avatars')
                ]);
                return redirect(route('student.profile', ['id' => $user->id, 'slug' => $user->slug ]));
            }
        }
        $this->validate($request, [
            'about' => 'max:140',
            'facebook_link' => 'max:100|min:15|string|unique:student_profiles,facebook_link,'.$user->id,
            'twitter_link' => 'max:100|min:15|string|unique:student_profiles,twitter_link|,'.$user->id,
            'instagram_link' => 'max:100|min:15|string|unique:student_profiles,instagram_link,'.$user->id
        ]);

        if($request->about !== $user->profile->about) {
            $user->profile->update([
                'about' => $request->about
            ]);
        }

        if($request->facebook_link !== $user->profile->facebook_link) {
            $user->profile->update([
                'facebook_link' => $request->facebook_link
            ]);
        }

        if($request->twitter_link !== $user->profile->twitter_link) {
            $user->profile->update([
                'twitter_link' => $request->twitter_link
            ]);
        }


        if($request->instagram_link !== $user->profile->instagram_link) {
            $user->profile->update([
                'instagram_link' => $request->instagram_link
            ]);
        }

        $request->session()->flash('success', 'Your profile was updated succesfully!');
        return redirect(route('student.profile', ['id' => $user->id, 'slug' => $user->slug ]));
    }

}
