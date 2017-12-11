<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Course;
use App\Faculty;
use App\Question;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:instructor');
    }
    public function create($slug)
    {
        $course = Course::whereSlug($slug)->first();

        $questions = Question::where(['course_id' => $course->id])->latest()->get();

        return view('quizzes.create', compact('questions', 'course'));
    }

    public function store(Request $request, $slug)
    {
        if (! $request->id) {
            \Session::flash('fail', 'You must select at least one question!');
            return back();
        }

        $course = Course::whereSlug($slug)->first();
        $quiz = new Quiz();
        $quiz_name = $quiz->determineName($slug);

        $quiz->quiz_name = $quiz_name;
        $quiz->course_id = $course->id;
        $quiz->faculty_id = Faculty::where('name', $course->faculty->name)->first()->id;
        $quiz->save();

        foreach($request->id as $key => $value) {
            $quiz->questions()->syncWithoutDetaching([$value]);
        }

        $quiz->syncStudents();

        \Session::flash('success', 'A quiz was created!');

        return redirect('/instructor');
    }
}
