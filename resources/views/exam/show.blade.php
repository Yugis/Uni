@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form method="POST" data-form-submit>
                    {{ csrf_field() }}
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            {{ $quiz->quiz_name }}
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
                            <input type="submit" class="btn btn-success" value="Submit" id="examSubmitButton">
                        </div>
                    </div>
                </form>
            </div>
            <timer :until="{{ count($quiz->questions) }}" class="countdown col-md-3"></timer>

            <div class="examModal-overlay">
                <div class="examModal">

                    <a class="close-examModal">
                        <svg viewBox="0 0 20 20">
                            <path fill="#000000" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
                        </svg>
                    </a><!-- close examModal -->

                    <div class="examModal-content">

                        <p>Please note that you can't re-take this quiz</p>
                        <p>if you leave without submitting your results you'll lose your chance and your score will be set to 0 !.</p>

                    </div><!-- content -->

                </div><!-- examModal -->
            </div><!-- overlay -->
        </div><!-- row -->
    </div><!-- container -->

@endsection
