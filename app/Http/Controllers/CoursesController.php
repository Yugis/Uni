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

  // Managing Attendance
  /*
  public function test()
  {
    $course = Course::where(['name' => 'Image Processing'])->first();

    $course->attendance = 23;

    $course->save();
    // dump($course->students);
    foreach($course->students as $student) {
      // $s = $student->courses->first()->pivot;
      // $s->attendance += 1;
      // $s->save();
      // dump($student->courses->first()->pivot->attendance);
      // dump($course->attendance);
      if($student->courses->first()->pivot->attendance / $course->attendance * 100 < 50){
        return 'Danger';
      } else {
        return 'Safe';
      }
    }
  }
  */

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
