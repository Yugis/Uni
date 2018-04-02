@extends('layouts.app')

@section('content')



    <div class="container" id="admin-dashboard-heading">
        <h1> {{ $course->name }} </h1>
	    <a href="{{ route('admin.edit.course', ['slug' => $course->slug]) }}" class="fixed-btn">Modify Course</a>
    </div>

    <manager-course-table
    :quizzes="{{ $course->quizzes }}"
    :course="{{ $course }}"
    ></manager-course-table>
    
@endsection
