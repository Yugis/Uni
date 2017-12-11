@extends('layouts.app')

@section('content')

    <div class="create-flex">
        <div class="col-md-6">
            <form method="POST">
                {{ csrf_field() }}
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        {{$quiz->quiz_name}}
                    </div>
                    <div class="panel-body">
                        <ol>
                            @foreach($quiz->questions as $index => $question)
                                <li><h4>{{ $question->title }} ? </h4></li>
                                <ul>
                                    <div class="flex-align-baseline">
                                        <li>{{$question->option_1}}</li>
                                        <input type="radio" name="{{$index}}" value="{{ $question->option_1 }}">
                                        <hr>
                                    </div>
                                    <div class="flex-align-baseline">
                                        <li>{{$question->option_2}}</li>
                                        <input type="radio" name="{{$index}}" value="{{ $question->option_2 }}">
                                        <hr>
                                    </div>
                                    <div class="flex-align-baseline">
                                        <li>{{$question->option_3}}</li>
                                        <input type="radio" name="{{$index}}" value="{{ $question->option_3 }}">
                                        <hr>
                                    </div>
                                    <div class="flex-align-baseline">
                                        <li>{{$question->option_4}}</li>
                                        <input type="radio" name="{{$index}}" value="{{ $question->option_4 }}">
                                        <hr>
                                    </div>
                                </ul>
                                <hr>
                            @endforeach
                        </ol>

                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
