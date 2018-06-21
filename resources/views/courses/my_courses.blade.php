@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-6 col-md-offset-4">
  		<h2 style="color:black;"> A list of your courses </h2>
    <div class="students-index-flex">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Appointment</th>
            <th>Room Id</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
              <tr>
                <td><a href="{{ route('student.course.show', ['name' => $course->slug]) }}">{{ $course->name }}</a></td>
                <td>{{ $course->appointment }}</td>
                <td>{{ $course->room_id }}</td>
             </tr>
           @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
