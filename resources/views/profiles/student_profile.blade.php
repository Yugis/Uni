@extends('layouts.app')

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-lg-4">
        <div class="panel panel-danger" style="text-align: center">
          <div class="panel-heading">
            {{$student->full_name}}'s Profile
          </div>

          <div class="panel-body">
            <center>
              <img src="{{ Storage::url($student->avatar)}}" width="150px" height="150px" style="border-radius: 100px">
            </center>
            @if($student->profile->location)
              <hr>
              <p><span style="color: firebrick; font-weight: bolder; font-size: 20px">{{$student->profile->location}}</span></p>
            @endif

            <hr>
            @if($student->profile->facebook_link)
              <a target="_blank" href="{{url($student->profile->facebook_link)}}"><img src="{{ Storage::url('public/defaults/icons/facebook.png')}}" width="60px" height="60px"></a>
            @endif

            @if($student->profile->twitter_link)
              <a target="_blank" href="{{$student->profile->twitter_link}}"><img src="{{ Storage::url('public/defaults/icons/twitter.png')}}" width="60px" height="60px"></a>
            @endif
          </div>
        </div>
    </div>

      <div class="col-lg-6">
        <div class="panel panel-danger" style="text-align:center;">
          <div class="panel-heading">
            {{$student->first_name}}'s Bio
          </div>

          <div class="panel-body">
            @if($student->profile->about)
              <p>{{$student->profile->about}}</p>
            @else
            <p>Not updated yet</p>
          @endif
          </div>
        </div>
      </div>

      <div class="col-lg-2">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Other Info
          </div>

          <div class="panel-body">
            @if($student->faculty)
              <p>Faculty: <br> <span style="color: darkseagreen; font-weight: bolder;">{{$student->faculty->name}}</span></p>
              <hr>
            @endif
            @if($student->year)
              <p>Current Year: <br> <span style="color: darkseagreen; font-weight: bolder;">{{$student->year->name}}</span></p>
              <hr>
            @endif
            @if(Auth::guard('web')->check())
              @if (Auth::user()->id == $student->id)
                {{-- <a href="{{ route('student.profile.edit', ['id' => $student->id, 'slug' => $student->slug]) }}" id="statusButton" class="btn btn-success btn-sm">Edit</a> --}}
                <a href="#" @click="showModal = true" id="statusButton" class="btn btn-success btn-sm">Edit</a>
                <edit-profile-modal :id="{{Auth::user()->id}}" :slug="'{{Auth::user()->slug}}'" :src="'{{Storage::url($student->avatar)}}'" @close="showModal = false" v-if="showModal"></edit-profile-modal>
              @endif
            @endif
            {{-- <p>{{}}</p>
            <hr> --}}
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
