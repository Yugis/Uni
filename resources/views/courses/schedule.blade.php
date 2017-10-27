@extends('layouts.app')

@section('content')
<div class="container">
  <div class="container-index">
  	<div class="course-index-heading">
    		<h2> Here is every course you are currentley teaching sir! </h2>
    </div>
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
                <td><a href="{{ route('courses.show', ['name' => $course->name]) }}">{{ $course->name }}</a></td>
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
