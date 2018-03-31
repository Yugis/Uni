@extends('layouts.app')

@section('content')
    <div class="contianer">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-danger results">
                    <div class="panel-heading">
                        Here are your results!
                    </div>
                    <div class="panel-body">
                        <ol>
                            @foreach($quiz->questions as $index => $question)
                                <li>
                                    <h4>{{ $question->title }} ? </h4>
                                    <ul>
                                        <label for="">THE CORRECT ANSWER IS:</label>
                                        <li>{{$question->correct_answer}}</li>

                                        <label for="">YOUR ANSWER WAS:</label>
                                        <li class="{{ session('data')[$index] == $question->correct_answer ? 'green' : 'red'}}">
                                            {{ session('data')[$index] ? session('data')[$index] : 'No answer provided!' }}
                                        </li>
                                    </ul>
                                </li>
                                <hr>
                            @endforeach
                        </ol>

    					<p class="score">Your total score is <span>{{ $quiz->students()->get()->where('id', Auth::user()->id)->first()->pivot->score }} </span></p>

                        <a class="btn btn-primary" style="display: block;" href="/home">Finish</a>
                    </div>
                </div>
            </div>
    </div>
    @endsection
