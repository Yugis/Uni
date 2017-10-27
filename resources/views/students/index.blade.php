@extends('layouts.app')

@section('content')
<div class="container">
  <div class="container-index">
    <div class="course-index-heading">
      <h2> All Students </h2>
    </div>
    <div class="students-index-flex">
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Faculty</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student)
              <tr>
                <td><img src="{{ Storage::url($student->avatar)}}" width="130px" height="130px" style="border-radius: 80px"></td>
                <td><a href="{{ route('student.profile', ['id' => $student->id, 'slug' => $student->slug ]) }}">{{ $student->full_name }}</a></td>
                <td>{{ $student->faculty()->first()->name }}</td>
                <td>{{ $student->email }}</td>
              </tr>
            @endforeach
        </tbody>
      </table>


    </div>
  </div>
</div>
@endsection
