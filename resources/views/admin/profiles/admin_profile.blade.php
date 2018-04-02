@extends('admin.layouts.master')

@section('admin.content')
    <div class="col-md-9">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Edit your profile
            </div>

            <div class="panel-body">
                <form action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" value="{{ $admin->first_name}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" value="{{ $admin->last_name}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $admin->email}}" class="form-control" required>
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
                        <label for="faculty">Current Faculty</label>
                        <select type="select" class="form-control" name="faculty_id">
                            <option value="{{ $admin->faculty_id}}" selected>{{ $admin->faculty->name }}</option>
                            @foreach ($faculties as $key => $value) {
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Update Profile</button>
                        <a class="btn btn-danger" href="{{ route('admin.trash.account', ['slug' => $admin->slug]) }}" style="float:right;">Deactivate Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
