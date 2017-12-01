<?php

namespace App\Http;

use Auth;
use App\Instructor;
use App\SecretIds;

trait RegistersInstructors {

  public function validateInstructor($request)
  {
    $this->validate($request, [
      'first_name' => 'required|max:30',
      'last_name' => 'required|max:30',
      'job_title' => 'required',
      'job_id' => 'required|exists:secret_ids,secret_id',
      'gender' => 'required|bool',
      'email' => 'required|unique:instructors,email|email',
      'faculty_name' => 'required',
      'course_name' => 'required',
      'phone_number' => 'required|unique:instructors,phone_number|digits:11',
      'password' => 'required|min:4|confirmed'
    ]);

    $valid_ids = SecretIds::where(['owner_type' => 'App\Instructor', 'owner_id' => null])->get()->pluck('id')->toArray();

    if(!in_array($request->job_id, $valid_ids)) {
      \Session::flash('fail', 'Error, job ID is invalid!');
      return redirect()->back()->withInput();
    }
  }

  public function recordInstructor($request)
  {
    if($request->gender)
    {
      $avatar = 'public/defaults/avatars/male.png';
    } else {
      $avatar = 'public/defaults/avatars/female.png';
    }

    $instructor = new Instructor();
    $instructor->job_title = $request->job_title;
    $instructor->first_name = ucfirst($request->first_name);
    $instructor->last_name = ucfirst($request->last_name);
    $instructor->full_name = $instructor->first_name . ' ' . $instructor->last_name;
    $instructor->slug = str_slug($instructor->first_name . ' ' . $instructor->last_name, '-');
    $instructor->gender = $request->gender;
    $instructor->avatar = $avatar;
    $instructor->email = $request->email;
    $instructor->phone_number = $request->phone_number;
    $instructor->password = bcrypt($request->password);
    $instructor->office_location = $request->office_location;
    $instructor->save();
    $instructor->faculties()->attach($request->faculty_name);
    $instructor->courses()->attach($request->course_name);

    SecretIds::where('secret_id', $request->job_id)->first()->update(['owner_id' => $instructor->id]);

    $instructor->profile()->create(['instructor_id' => $instructor->id]);

    Auth::guard('instructor')->login($instructor);
  }
}
