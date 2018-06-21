@extends('layouts.app')

@section('content')


    <div class="col-md-8 col-md-offset-3" id="dashboard-heading">
        <h1> {{ $course->name }} </h1>
    </div>
    <div class="col-md-8 col-md-offset-3">
        <h3>Your Marks For This Course:</h3>
        <table class="table .table-hover">
            <thead>
                <tr>
                    <th>Total Grades</th>
                    <th>Attendance</th>
                    @foreach($quizzes as $quiz)
                        <th> {{ $quiz->quiz_name }} </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
               <tr>
                   <td>
                       {{ $grades }}
                   </td>
                   <td>
                       {{ $attendance }}
                   </td>
                   @foreach($quizzes as $quiz)
                        <td>{{ $quiz->pivot->score }}</td>
                   @endforeach
               </tr>
            </tbody>
        </table>

    </div>
@endsection
