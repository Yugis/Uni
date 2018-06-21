@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="col-md-8 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Edit your profile
            </div>

            <div class="panel-body">
                <form action="{{ route('student.profile.update', ['id' => $student->id, 'slug' => $student->slug]) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" value="{{ $student->first_name}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" value="{{ $student->last_name}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $student->email}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="avatar">Upload new avatar</label>
                        <input type="file" name="avatar" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="phone_number">Phone Number</label>
                      <input type="text" name="phone_number" class="form-control" value="{{ $student->phone_number }}">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Update Profile</button>
                    </div>
                </form>

                <p style="color:darkgreen; font-size:small;">This information will not be publicly available!</p>

                @include('errors.errors')
            </div>
        </div>
    </div>
</div>
@endsection
