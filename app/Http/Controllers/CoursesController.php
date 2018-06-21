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
        $this->middleware('auth:web,instructor,admin');
    }

    public function myCourses()
    {
        $courses = auth()->user()->courses()->orderBy('name', 'asc')->get();

        return view('courses.my_courses', compact('courses'));
    }

    public function create()
    {
        $courses = Course::all();

        return view('createcourse', compact('courses'));
    }


    public function store(Request $request)
    {
        $students = Student::where('year_id', $request->yearName)->pluck('id');
        $faculty = Faculty::whereName($request->facultyName)->first();
        $year = Year::whereName($request->yearName)->first();
        $course = Course::create(['name' => $request->courseName, 'slug' => str_slug($request->courseName, '-'), 'faculty_id' => $faculty->id, 'year_id' => $year->id]);
        $course->students()->sync($students);

        return redirect('create.course');
    }

    public function show($slug)
    {
        $course = Course::whereSlug($slug)->first();
        $student = auth()->user();
        $grades = $student->courses()->whereSlug($slug)->first()->pivot->grades;
        $attendance = $student->courses()->whereSlug($slug)->first()->pivot->attendance;
        $quizzes = $student->quizzes()->where('course_id', $course->id)->get();
        foreach ($quizzes as $quiz) {
            $grades += $quiz->pivot->score;
        }
        $student->courses()->whereSlug($slug)->first()->pivot->save();


        return view('courses.show', compact('course', 'student', 'grades', 'attendance', 'quizzes'));
    }
}
