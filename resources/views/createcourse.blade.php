@extends('layouts.app')

@section('content')
    <div class="containter">
      <div class="create-flex">
        <div class="col-md-8">
          <div class="panel panel-default">
            <form method="POST">
                {{ csrf_field() }}
              <div class="panel-body">
                <div class="form-group">
                 <label for="courseName">Create Course</label>
                   <div>
                     <input type="text" name="courseName" class="form-control" placeholder="Course Name" autofocus>
                   </div>
                   <div class="form-spacing-top">
                     <input type="text" name="facultyName" class="form-control" placeholder="Which faculty?">
                   </div>
                   <div class="form-spacing-top">
                   <input type="text" name="yearName" class="form-control" placeholder="Which year?">
                   </div>
               </div>
               <input type="submit" value="Submit" class="btn btn-danger">
              </div>
          </form>
          </div>
        </div>
        </div>
      </div>

    <div class="temp">

        @foreach ($courses as $course)
              <ul>
                <li>  {{ $course->name }} </li>
              </ul>
        @endforeach

    </div>

@endsection
