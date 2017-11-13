<?php

namespace App\Http\Controllers;

use Auth;
use App\Course;
use App\Faculty;
use App\SecretIds;
use App\Instructor;
use App\Instructor_profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InstructorsController extends Controller
{
  public function __construct()
  {
    $this->middleware(['guest:instructor,web'], ['only' => 'create']);
  }

  public function all()
  {
    $instructors = Instructor::paginate(10);

    return view('instructors.all', compact('instructors'));
  }

  public function index()
  {
    return view('instructor-dashboard');
  }

  public function create()
  {
    $faculties = Faculty::pluck('name', 'id');
    $courses = Course::orderBy('name', 'asc')->pluck('name', 'id');
    return view('auth.instructor-register', compact('faculties', 'courses'));
  }

  public function store(Request $request)
  {
    $first_job_id = \App\SecretIds::where(['tag' => 'Instructor'])->first();
    $last_job_id = \App\SecretIds::where(['tag' => 'Instructor'])->get()->last();
    $this->validate($request, [
      'first_name' => 'required|max:30',
      'last_name' => 'required|max:30',
      'job_title' => 'required',
      'job_id' => 'required|exists:secret_ids,id',
      'gender' => 'required|bool',
      'email' => 'required|unique:instructors,email|email',
      'faculty_name' => 'required',
      'course_name' => 'required',
      'phone_number' => 'required|unique:instructors,phone_number|digits:11',
      'password' => 'required|min:4|confirmed'
    ]);

    $valid_ids = SecretIds::where(['tag' => 'Instructor', 'instructor_id' => null])->get()->pluck('id')->toArray();

    if(!in_array($request->job_id, $valid_ids)) {
      \Session::flash('fail', 'Error, job ID is invalid!');
      return redirect()->back()->withInput();
    }

    if($request->gender)
    {
      $avatar = 'public/defaults/avatars/male.png';
    } else {
      $avatar = 'public/defaults/avatars/female.png';
    }

    $instructor = new Instructor();
    $instructor->job_title = $request->job_title;
    // $instructor->job_id = $request->job_id;
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

    SecretIds::where('id', $request->job_id)->first()->update(['instructor_id' => $instructor->id]);

    Instructor_profile::create(['instructor_id' => $instructor->id]);

    Auth::guard('instructor')->login($instructor);

    return redirect('/instructor');
  }

  public function myCourses()
  {
    $courses = Auth::user()->courses;

    return view('courses.schedule', compact('courses'));
  }
}
