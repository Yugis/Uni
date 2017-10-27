@extends('layouts.app')

@section('content')


  <div class="container">
    <div class="container-index">
    	<div class="course-index-heading">
      <h1> {{ $course->name }} </h1>
    </div>
        <div class="students-index-flex">
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Faculty</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($course->students as $student)
                  <tr>
                    <td><a href="{{ route('student.profile', ['id' => $student->id, 'slug' => $student->slug ]) }}">{{ $student->full_name }}</a></td>
                    <td>{{ $student->faculty()->first()->name }}</td>
                    <td>{{ $student->email }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
  </div>
  </div



@endsection
