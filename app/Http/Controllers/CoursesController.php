<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Faculty;
use App\Student;
use App\Year;
use Auth;

class CoursesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:web,instructor')->except(['create', 'store']);
  }

  public function myCourses()
  {
    $courses = Auth::user()->courses;

    return view('courses.my_courses', compact('courses'));
  }

  public function create()
  {
    $courses = Course::all();

    return view('createcourse', compact('courses'));
  }


  public function store(Request $request)
  {
    $faculty = Faculty::where('name', $request->facultyName)->first();
    $year = Year::where('name', $request->yearName)->first();
    $course = Course::create(['name' => $request->courseName, 'faculty_id' => $faculty->id, 'year_id' => $year->id]);

    return redirect('create.course');
  }

  public function show($name)
  {
    $course = Course::where(['name' => $name])->first();

    return view('courses.show', compact('course'));
  }
}
