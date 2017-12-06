<?php

namespace App\Http\Controllers;

use Auth;
use App\Course;
use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
  public function create()
  {
    $courses = Auth::user()->courses->pluck('name', 'id');

    return view('createquestions', compact('courses'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'questionTitle' => 'required|unique:questions,title',
      'option_1' => 'required',
      'option_2' => 'required',
      'option_3' => 'required',
      'option_4' => 'required',
      'correct_answer' => 'required',
      'course_id' => 'required'
    ]);

    $correct = $request->correct_answer;

    $q = new Question;
    $q->title = $request->questionTitle;
    $q->option_1 = $request->option_1;
    $q->option_2 = $request->option_2;
    $q->option_3 = $request->option_3;
    $q->option_4 = $request->option_4;
    $q->correct_answer = $request->$correct;
    $q->course_id = $request->course_id;

    $q->save();
    \Session::flash('success', 'Question Created Successfully!');

    return redirect()->back();
  }
}
