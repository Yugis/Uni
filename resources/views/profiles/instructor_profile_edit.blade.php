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
            <form enctype="multipart/form-data" action="{{ route('instructor.profile.edit', ['id' => $instructor->id, 'slug' => $instructor->slug]) }}" method="POST">
                <label for="avatar">Update Profile Image</label>
                <input type="file" name="avatar" class="form-control" accept="image/*">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="pull-right btn btn-primary" style="margin-top: 10px;">
                  Submit
                </button>
            </form>
          </div>
        </div>
    </div>

    <div class="col-lg-6">
      <div class="panel panel-danger" style="text-align:center;">
        <div class="panel-heading">
            Edit your profile
        </div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('instructor.profile.edit', ['id' => $instructor->id, 'slug' => $instructor->slug]) }}">
            {{ csrf_field() }}

          <div class="form-group">
            <label for="about" class="col-md-4 control-label">Your biography goes here:</label>
              <div class="col-md-8">
                  <textarea id="about" type="text" class="form-control" name="about" value="{{ old('about', $instructor->profile->about) }}" autofocus placeholder="Write an awesome auto-biography...">{{ $instructor->profile->about }}</textarea>
              </div>
            </div>

              <div class="form-group">
                  <label for="facebook_link" class="col-md-4 control-label">Facebook Link</label>
                  <div class="col-md-8">
                      <input id="facebook_link" type="text" class="form-control" name="facebook_link" value="{{ old('facebook_link', $instructor->profile->facebook_link) }}" placeholder="example: www.facebook.com/person">
                  </div>
              </div>

              <div class="form-group">
                  <label for="twitter_link" class="col-md-4 control-label">Twitter Link</label>
                  <div class="col-md-8">
                      <input id="twitter_link" type="text" class="form-control" name="twitter_link" value="{{ old('twitter_link', $instructor->profile->twitter_link) }}" placeholder="example: www.twitter.com/person">
                  </div>
              </div>

              <div class="form-group">
                  <label for="instagram_link" class="col-md-4 control-label">Instagram Link</label>
                  <div class="col-md-8">
                      <input id="instagram_link" type="text" class="form-control" name="instagram_link" value="{{ old('instagram_link',  $instructor->profile->instagram_link) }}" placeholder="example: www.instagram.com/person">
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-md-offset-8">
                      <button type="submit" class="btn btn-primary">
                        Submit
                      </button>
                  </div>
              </div>
              <p style="color:red; font-size:small;">This information will be publicly available!</p>
            </form>

            @if ($errors->any())
                <span class="help-block">
                    <strong>{{ $errors->first() }}</strong>
                </span>
            @endif

        </div>
      </div>
    </div>

</div>
@endsection
