@extends('layouts.app')

@section('content')
    <div class="container" id="admin-dashboard-heading">
        <h2> All Students </h2>
    </div>
    <div class="container">
        <table class="table table-hover">
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
                        <td><img src="{{ Storage::url($student->avatar)}}" width="80px" height="80px" style="border-radius: 80px"></td>
                        <td><a href="{{ route('student.profile', ['id' => $student->id, 'slug' => $student->slug ]) }}">{{ $student->full_name }}</a></td>
                        <td>{{ $student->faculty()->first()->name }}</td>
                        <td>{{ $student->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
