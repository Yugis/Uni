@extends('layouts.app')

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-lg-4">
        <div class="panel panel-danger">
          <div class="panel-heading" style="text-align: center">
            {{$instructor->full_name}}'s Profile
          </div>

          <div class="panel-body">
            <center>
              <img src="{{ Storage::url($instructor->avatar)}}" width="150px" height="150px" style="border-radius: 100px">
            </center>
            <hr>
            @if(Auth::guard('web')->check())
              <follow-status :instructor_id="{{$instructor->id}}"></follow-status>
              <br>
            @endif
           </div>
        </div>

        <div class="panel panel-danger">
          <div class="panel-heading" style="text-align: center">
            Now teaching...
          </div>

          <div class="panel-body">
            @foreach($instructor->faculties as $faculty)
              {{$faculty->name}}: <br> --------------------------<br>
              @foreach($instructor->coursesPerFaculty($faculty->id) as $course)
                <a href="{{ route('courses.show', ['slug' => $course->slug]) }}">{{$course->name}}</a> <br>
              @endforeach
              <hr>
            @endforeach
          </div>
        </div>
    </div>

      <div class="col-lg-6">
        <div class="panel panel-danger" style="text-align:center;">
          <div class="panel-heading">
            Instructor {{$instructor->last_name}}'s Bio
          </div>

          <div class="panel-body">
            @if($instructor->profile->about)
              <p>{{$instructor->profile->about}}</p>
            @else
            <p>Not updated yet</p>
          @endif
          </div>
        </div>

          @if(Auth::guard('instructor')->check())
            @if (Auth::user()->id == $instructor->id)
              <img src="{{ Storage::url(Auth::user()->avatar)}}" width="33px" height="33px" style="border-radius: 2px; position:relative; background-color:lightgray; margin-bottom: 10px;" class="pull-left">
              {{-- <div class="form-group">
                <form action="route('instructor.post', ['id' => $instructor->id, 'slug' => $instructor->slug])" method="POST" class="form-horizontal" role="form">
                  {{ csrf_field() }}
                  <textarea name="body" id="postarea" class="form-control" rows="2" placeholder="Write a new post..."></textarea>
                  <input type="submit" class="pull-right btn btn-sm btn-primary" value="Post" style="margin-top: 10px; margin-bottom: 10px;">
                </form>
              </div> --}}

              <posting :id="{{Auth::user()->id}}"></posting>
            @endif
          @endif

          @if($instructor->posts)
            <feed :id="{{Auth::user()->id}}"></feed>
          @endif
      </div>


      <div class="col-lg-2">
        <div class="panel panel-danger">
          <div class="panel-heading">
            Other Info
          </div>

          <div class="panel-body">
            @if($instructor->office_location)
              <p>Office location is: <span style="color: darkseagreen; font-weight: bolder;">{{$instructor->office_location}}</span></p>
              <hr>
            @endif
            @if($instructor->phone_number)
              <p>Phone Number: <span style="color: darkseagreen; font-weight: bolder;">{{$instructor->phone_number}}</span></p>
              <hr>
            @endif
            @if(Auth::guard('instructor')->check())
              @if (Auth::user()->id == $instructor->id)
                <a href="{{ route('instructor.profile.edit', ['id' => $instructor->id, 'slug' => $instructor->slug]) }}" id="statusButton" class="btn btn-success btn-sm">Edit</a>
              @endif
            @endif
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
