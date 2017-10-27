@extends('layouts.app')

@section('content')
<div class="container">
  <div class="container-index">
    <div class="course-index-heading">
      <h2> All Instructors </h2>
    </div>
    <div class="students-index-flex">
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($instructors as $instructor)
              <tr>
                <td><img src="{{ Storage::url($instructor->avatar)}}" width="130px" height="130px" style="border-radius: 80px"></td>
                <td><a href="{{ route('instructor.profile', ['id' => $instructor->id, 'slug' => $instructor->slug ]) }}">{{ $instructor->full_name }}</a></td>
                <td>{{ $instructor->email }}</td>
              </tr>
            @endforeach
        </tbody>
      </table>


    </div>
  </div>
</div>
@endsection
