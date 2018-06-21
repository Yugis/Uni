@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-offset-3">
  <div style="background-color: white; padding: 15px; margin-bottom: 10px;">    
    <h3>Lectures Schedule:</h3>
    @foreach($faculties as $faculty)
            <h1>{{ $faculty->name }}</h1>
        @if(isset($faculty->lecture_schedule))
            <img src="{{ Storage::url($faculty->lecture_schedule) }}" width="75%" height="30%" style="background-color: ghostwhite;">
        @else
            <p>There is no schedule available yet, please try again later or try contacting your admin.</p>
        @endif
    @endforeach

    <hr>

    <h3>Exams Schedule:</h3>
    @if(isset($faculty->exam_schedule))
    <img src="{{ Storage::url($faculty->exam_schedule) }}" width="100%" height="50%" style="background-color: ghostwhite;">
    @else
    <p>There is no exam schedule available yet, please try again later or try contacting your admin.</p>
    @endif
  </div>
</div>

@endsection
