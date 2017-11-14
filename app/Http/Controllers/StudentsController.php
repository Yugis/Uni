<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Year;
use App\Course;
use App\Faculty;
use App\Student;
use App\SecretIds;
use App\Instructor;
use App\Http\Requests;
use App\Student_profile;
use App\Instructor_student;

class StudentsController extends Controller
{
  public function __construct()
  {
    $this->middleware(['guest:instructor,web'])->except(['index', 'check']);
  }

  public function test()
  {
    return \App\SecretIds::all();
  }


  //This is how you update pivot table attributes
  /*
  public function testing(Request $request)
  {
  $grades = Auth::user()->courses->first()->pivot;
  $grades->grades += 10;
  $grades->save();
  dd($grades->grades);
} */

public function check($id)
{
  if(Auth::user()->isFollowing()->where('instructor_id', $id)->first()) {
    return ['status' => 'Followed'];
  } else {
    return ['status' => 'Unfollowed'];
  }
}

public function toggle($id)
{
  $student = Auth::user();
  if($student->isFollowing()->where('instructor_id', $id)->first()) {
    $student->isFollowing()->detach($id);
    return ['status' => 'Unfollowed'];
  } else {
    $student->isFollowing()->syncWithoutDetaching([$id]);
    return ['status' => 'Followed'];
  }
}

public function index()
{
  $students = Student::paginate(10);

  return view('students.index', compact('students'));
}

public function create()
{
  $faculties = Faculty::pluck('name', 'id');
  $years = Year::pluck('name', 'id');

  return view('auth.register', compact('faculties', 'years'));
}

public function store(Request $request)
{
  $first_student_id = \App\SecretIds::where(['tag' => 'Student'])->first();
  $last_student_id = \App\SecretIds::where(['tag' => 'Student'])->get()->last();

  $this->validate($request, [
    'first_name' => 'required|max:30',
    'last_name' => 'required|max:30',
    'student_id' => 'required|exists:secret_ids,id',
    'gender' => 'required|bool',
    'email' => 'required|unique:students,email|email',
    'faculty_name' => 'required',
    'year_name' => 'required',
    'phone_number' => 'required|unique:students,phone_number|digits:11',
    'password' => 'required|min:4|confirmed'
  ]);

  $valid_ids = SecretIds::where(['tag' => 'Student', 'student_id' => null])->get()->pluck('id')->toArray();

  if(!in_array($request->student_id, $valid_ids)) {
    \Session::flash('fail', 'Error, job ID is invalid!');
    return redirect()->back()->withInput();
  }

  if($request->gender)
  {
    $avatar = 'public/defaults/avatars/male.png';
  }
  else
  {
    $avatar = 'public/defaults/avatars/female.png';
  }

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

  SecretIds::where('id', $request->student_id)->first()->update(['student_id' => $student->id]);

  Student_profile::create(['student_id' => $student->id]);

  \Auth::login($student);

  return redirect('/home');
}

public function attachCourses($request)
{
  return Course::where(['faculty_id' => $request->faculty_name, 'year_id' => $request->year_name])->get();
}
}
