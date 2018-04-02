@extends('layouts.app')

@section('content')
    <div class="container" id="admin-dashboard-heading">
        <h2> Here is every course you are currentley teaching sir! </h2>
    </div>
    <div class="container">
        <table class="table table-hover">
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
                        <td><a href="{{ route('courses.show', ['slug' => $course->slug]) }}">{{ $course->name }}</a></td>
                        <td>{{ $course->appointment }}</td>
                        <td>{{ $course->room_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
