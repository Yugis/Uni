@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <div class="panel panel-danger" style="text-align:center;">
        <div class="panel-heading">
          Instructor {{$instructor->last_name}}'s Bio
        </div>

        <div class="panel-body">
          @if($instructor->about)
          <p>{{$instructor->about}}</p>
          @else
          <p>Not updated yet</p>
          @endif
        </div>
      </div>
      <div class="panel panel-danger">
        <div class="panel-heading" style="text-align: center">
          Now teaching...
        </div>

        <div class="panel-body">
          @foreach($instructor->faculties as $faculty)
          {{$faculty->name}}: <br> --------------------------<br>
          @foreach($instructor->coursesPerFaculty($faculty->id) as $course)
          <a href="{{ route('instructor.course.show', ['slug' => $course->slug]) }}">{{$course->name}}</a> <br>
          @endforeach
          <hr>
          @endforeach
        </div>
      </div>
    </div>


    <div class="col-lg-2">
      <div class="panel panel-danger">
        <div class="panel-heading">
          Other Info
        </div>

        <div class="panel-body">
          @if($instructor->office_location)
          <p>Office location is: <span style="color: darkseagreen; font-weight: bolder;">{{$instructor->office_location}}</span></p>
          <hr>
          @endif
          @if($instructor->phone_number)
          <p>Phone Number: <span style="color: darkseagreen; font-weight: bolder;">{{$instructor->phone_number}}</span></p>
          <hr>
          @endif
          @if(Auth::guard('instructor')->check())
          @if (Auth::user()->id == $instructor->id)
          <a href="{{ route('instructor.profile.edit', ['id' => $instructor->id, 'slug' => $instructor->slug]) }}" id="statusButton" class="btn btn-success btn-sm">Edit</a>
          @endif
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
