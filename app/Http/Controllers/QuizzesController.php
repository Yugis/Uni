<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Course;
use App\Question;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
  public function create($slug)
  {
    $course = Course::where(['slug' => $slug])->first();

    $questions = Question::where(['course_id' => $course->id])->latest()->get();

    return view('quizzes.create', compact('questions'));
  }

  public function store(Request $request)
  {
    // dd($request->id);
    // $collection = collect($request->except('_token'));
    // $collection->each(function ($item, $key) {
    //
    // });
    // dd($collection);

    // dd(Quiz::with('questions')->first());
    $quiz = Quiz::create();
    foreach($request->id as $key => $value) {
      $quiz->questions()->syncWithoutDetaching([$value]);
    }

    \Session::flash('success', 'A quiz was created!');

    return redirect('/instructor');
  }
}
