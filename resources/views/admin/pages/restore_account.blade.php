@extends('admin.layouts.master')

@section('admin.content')

<div class="col-md-9">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Restore Account
		</div>

		<div class="panel-body">
			<form action="" method="POST">
				{{ csrf_field() }}

				<h3 style="color:darkgreen">After performing this action:</h3>
				<ul style="color:darkgreen">
					<li>This account will be restored and active again as an admin account.</li>
					<li>Admin {{ $trashedAccount->full_name }} will be able to use their admin account normally once aganin.</li>
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
					<button class="btn btn-success" type="submit">Restore Account</button>
				</div>
			</form>
		</div>
	</div>

	@endsection