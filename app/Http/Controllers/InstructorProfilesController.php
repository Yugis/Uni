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
    'facebook_link' => 'unique:instructor_profiles,facebook_link|max:100|min:15|string',
    'twitter_link' => 'unique:instructor_profiles,twitter_link|max:100|min:15|string',
    'instagram_link' => 'unique:instructor_profiles,instagram_link|max:100|min:15|string'
  ]);

  if($request->has('about')){
    if($request->about !== Auth::user()->profile->about) {
      Auth::user()->profile->update([
        'about' => $request->about
      ]);
    }
  }

  if($request->has('facebook_link')){
    if($request->facebook_link !== Auth::user()->profile->facebook_link) {
      Auth::user()->profile->update([
        'facebook_link' => $request->facebook_link
      ]);
    }
  }

  if($request->has('twitter_link')){
    if($request->twitter_link !== Auth::user()->profile->twitter_link) {
      Auth::user()->profile->update([
        'twitter_link' => $request->twitter_link
      ]);
    }
  }

  if($request->has('instagram_link')){
    if($request->instagram_link !== Auth::user()->profile->instagram_link) {
      Auth::user()->profile->update([
        'instagram_link' => $request->instagram_link
      ]);
    }
  }

  $request->session()->flash('success', 'Your profile was updated succesfully!');
  return redirect(route('instructor.profile', ['id' => Auth::user()->id, 'slug' => Auth::user()->slug ]));
  }

}
