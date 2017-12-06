<?php

namespace App\Http\Controllers;

use Auth;
use App\Course;
use App\Faculty;
use App\Instructor;
use Illuminate\Http\Request;
use App\Http\RegistersInstructors;
use Illuminate\Validation\Rule;

class InstructorsController extends Controller
{

    use RegistersInstructors;

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
        $this->validateInstructor($request);

        $this->recordInstructor($request);

        return redirect('/instructor');
    }

    public function myCourses()
    {
        $courses = Auth::user()->courses;

        return view('courses.schedule', compact('courses'));
    }
}
