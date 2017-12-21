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
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request, $slug, $quiz_name)
    {
        $course_id = Course::whereSlug($slug)->where('faculty_id', Auth::user()->faculty_id)->first()->id;
        $quiz = Quiz::getActiveQuiz([$course_id])->where('quiz_name', $quiz_name)->first()->load('questions');

        $data = [];

        foreach(array_combine(request()->except('_token'), $quiz->questions()->pluck('correct_answer')->toArray()) as $student_answer => $correct_answer) {
            if($student_answer == $correct_answer) {
                $pivot = Auth::user()->quizzes()->whereQuizName($quiz_name)->where('course_id', $course_id)->first()->pivot;
                $pivot->score += 2;
                $pivot->save();
            }

            array_push($data, $student_answer);
        }

        $pivot = $quiz->students()->whereEmail(Auth::user()->email)->first()->pivot;
        $pivot->completed = true;
        $pivot->save();

        session()->flash('data', $data);

        return view('exam.results', compact('quiz'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($slug, $quiz_name)
    {
        $course_id = Course::whereSlug($slug)->where('faculty_id', Auth::user()->faculty_id)->first()->id;

        if(Auth::user()->quizzes()->whereQuizName($quiz_name)->where('course_id', $course_id)->first()->pivot->completed) {
            \Session::flash('fail', "Sorry, you can't take a quiz more than once!" );
            return redirect('/home');
        }



        $quiz = Quiz::getActiveQuiz([$course_id])->where('quiz_name', $quiz_name)->first()->load('questions');

        return view('exam.show', compact('quiz'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}
