@extends('layouts.app')

@section('content')
    <div class="create-flex">
        <div class="col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Here are your results!
                </div>
                <div class="panel-body">
                    <ol>
                        @foreach($quiz->questions as $index => $question)
                            <li><h4>{{ $question->title }} ? </h4></li>
                            <ul>
                                @if(session('data')[$index] == $question->correct_answer)
                                    <li class="{{session('data')[$index] == $question->option_1 ? 'alert alert-success' : '' }}">{{$question->option_1}}</li>
                                    <li class="{{session('data')[$index] == $question->option_2 ? 'alert alert-success' : '' }}">{{$question->option_2}}</li>
                                    <li class="{{session('data')[$index] == $question->option_3 ? 'alert alert-success' : '' }}">{{$question->option_3}}</li>
                                    <li class="{{session('data')[$index] == $question->option_4 ? 'alert alert-success' : '' }}">{{$question->option_4}}</li>
                                @endif

                                @if(session('data')[$index] !== $question->correct_answer)
                                    <li class="{{session('data')[$index] == $question->option_1 ? 'alert alert-danger' : '' }}">{{$question->option_1}}</li>
                                    <li class="{{session('data')[$index] == $question->option_2 ? 'alert alert-danger' : '' }}">{{$question->option_2}}</li>
                                    <li class="{{session('data')[$index] == $question->option_3 ? 'alert alert-danger' : '' }}">{{$question->option_3}}</li>
                                    <li class="{{session('data')[$index] == $question->option_4 ? 'alert alert-danger' : '' }}">{{$question->option_4}}</li>
                                @endif
                            </ul>
                            <hr>
                        @endforeach
                    </ol>
                    <a class="btn btn-primary" href="/home">Finish</a>
                </div>
            </div>
        </div>
    @endsection
