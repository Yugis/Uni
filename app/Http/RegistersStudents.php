<?php

namespace App\Http;

use Auth;
use App\Course;
use App\Student;
use App\SecretIds;

trait RegistersStudents {

  public function validateStudent($request)
  {
    $this->validate($request, [
      'first_name' => 'required|max:30',
      'last_name' => 'required|max:30',
      'student_id' => 'required|exists:secret_ids,secret_id',
      'gender' => 'required|bool',
      'email' => 'required|unique:students,email|email',
      'faculty_name' => 'required',
      'year_name' => 'required',
      'phone_number' => 'required|unique:students,phone_number|digits:11',
      'password' => 'required|min:4|confirmed'
    ]);

    $valid_ids = SecretIds::where(['owner_type' => 'App\Student', 'owner_id' => null])->get()->pluck('id')->toArray();

    if(!in_array($request->student_id, $valid_ids)) {
      \Session::flash('fail', 'Error, student ID is invalid!');
      return redirect()->back()->withInput();
    }
  }

  public function recordStudent($request)
  {
    $avatar = $request->gender ? 'public/defaults/avatars/male.png' : 'public/defaults/avatars/female.png';

    $student = new Student();
    $student->first_name = ucfirst($request->first_name);
    $student->last_name = ucfirst($request->last_name);
    $student->full_name = $student->first_name . ' ' . $student->last_name;
    $student->slug = str_slug($student->first_name . ' ' . $student->last_name, '-');
    $student->gender = $request->gender;
    $student->avatar = $avatar;
    $student->email = $request->email;
    $student->phone_number = $request->phone_number;
    $student->password = bcrypt($request->password);
    $student->faculty_id = $request->faculty_name;
    $student->year_id = $request->year_name;
    $student->save();
    $student->courses()->attach($this->attachCourses($request));

    SecretIds::where('secret_id', $request->student_id)->first()->update(['owner_id' => $student->id]);

    $student->profile()->create(['student_id' => $student->id]);

    Auth::login($student);
  }

  public function attachCourses($request)
  {
    return Course::where(['faculty_id' => $request->faculty_name, 'year_id' => $request->year_name])->get();
  }
}
