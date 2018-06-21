<?php

namespace App\Http\Controllers;

use Auth;
use App\Quiz;
use App\Course;
use Illuminate\Http\Request;

class ExaminationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $slug, $quiz_name)
    {

        $course_id = $this->getCourse($slug);
        $quiz = Quiz::getActiveQuiz([$course_id])->where('quiz_name', $quiz_name)->first()->load('questions');
        $request = request()->except('_token');
        $correct_answers = $quiz->questions()->pluck('correct_answer')->toArray();

        if(count($request) < count($correct_answers)) {
            while(count($request) < count($correct_answers)) {
                array_push($request, '');
            }
        }

        foreach(array_combine($request, $correct_answers) as $student_answer => $correct_answer) {
            if($student_answer == $correct_answer) {
                $pivot = Auth::user()->quizzes()->whereQuizName($quiz_name)->where('course_id', $course_id)->first()->pivot;
                $pivot->score += 2;
                $pivot->save();
            }
        }

        $pivot = $quiz->students()->whereEmail(Auth::user()->email)->first()->pivot;
        $pivot->completed = true;
        $pivot->save();


        session()->flash('data', $request);

        return view('exam.results', compact('quiz'));
    }

    public function show($slug, $quiz_name)
    {
        $course_id = $this->getCourse($slug);
        $pivot = Auth::user()->quizzes()->whereQuizName($quiz_name)->where('course_id', $course_id)->first()->pivot;

        if($pivot->completed) {
            \Session::flash('fail', "Sorry, you can't take a quiz more than once!" );
            return redirect()->route('home');
        }

        $quiz = Quiz::getActiveQuiz([$course_id])->where('quiz_name', $quiz_name)->first()->load('questions');

        $pivot->completed = true;
        $pivot->save();

        return view('exam.show', compact('quiz'));
    }

    private function getCourse($slug)
    {
        return Course::whereSlug($slug)->where('faculty_id', Auth::user()->faculty_id)->first()->id;
    }
}
