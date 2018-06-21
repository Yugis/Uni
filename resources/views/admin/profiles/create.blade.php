@extends('admin.layouts.master')

@section('admin.content')
<div class="col-md-9">
	<div class="panel panel-primary">
		<div class="panel-heading">Register a new Admin account</div>
		<div class="panel-body">
			<form method="POST" action="{{ route('admin.submit.register') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
					<label for="first_name" class="col-md-4 control-label">First Name:</label>
					<input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
				</div>

				<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
					<label for="last_name" class="col-md-4 control-label">Last Name:</label>
					<input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>
				</div>

				<div class="form-group{{ $errors->has('admin_id') ? ' has-error' : '' }}">
					<label for="admin_id" class="col-md-4 control-label">Admin ID:</label>
					<input id="admin_id" type="password" class="form-control" name="admin_id" placeholder="Please provide the ID number of the new Admin..." required>
				</div>

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="col-md-4 control-label">E-Mail Address:</label>
					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="col-md-4 control-label">Password:</label>
					<input id="password" type="password" class="form-control" name="password" required>
				</div>

				<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
					<label for="password-confirm" class="col-md-4 control-label">Confirm Password:</label>
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
				</div>

                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                    <label for="phone_number" class="col-md-4 control-label">Phone Number:</label>
                     <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required autofocus>
                </div>

				<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
					<label for="gender" class="col-md-4 control-label">Gender:</label>

					<select name="gender" id="gender" class="form-control">
						<option value="" disabled selected>Please select the gender</option>
						<option value="1">Male</option>
						<option value="0">Female</option>
					</select>
				</div>

				<div class="form-group{{ $errors->has('faculty_id') ? ' has-error' : '' }}">
					<label for="faculty_id" class="col-md-4 control-label">Associated Faculty:</label>

					<select id="faculty_id" type="select" class="form-control" name="faculty_id" required>
						<option value="" disabled selected>Please select their faculty</option>
						@foreach ($faculties as $key => $value) {
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						Register
					</button>
				</div>

				@include('errors.errors')

			</form>
		</div>
	</div>
</div>
@endsection