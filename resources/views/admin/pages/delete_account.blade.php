@extends('admin.layouts.master')

@section('admin.content')

<div class="col-md-9">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Delete Account
		</div>

		<div class="panel-body">
			<form action="" method="post">
				{{ csrf_field() }}

				<h3 style="color:red">Please notice the following:</h3>
				<ul style="color:red">
					<li>This account will be removed completely from the system, it won't be accessible again.</li>
				</ul>

				<hr>

				<div class="form-group{{ $errors->has('admin_id') ? ' has-error' : '' }}">
					<label for="admin_id" class="col-md-4 control-label">Please provide your Admin ID:</label>
					<input id="admin_id" type="password" class="form-control" name="admin_id" placeholder="Please enter your Admin ID..." required>
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="control-label">Please type in your current password:</label>
					<input id="password" type="password" class="form-control" name="password" required>
				</div>

				<hr>

				<div class="form-group">
					<button class="btn btn-danger" type="submit">Delete Account</button>
				</div>
			</form>
		</div>
	</div>

	@endsection