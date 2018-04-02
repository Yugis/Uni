@extends('admin.layouts.master')

@section('admin.content')
<div class="col-md-9">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Deactivate your account!
		</div>

	<div class="panel-body">
		<form action="" method="post">
			{{ csrf_field() }}

			<h3 style="color:red">Please take note of the following:</h3>
			<ul style="color:red">
				<li>Your account won't be permanently deleted, it will only be deactivated.</li>
				<li>If You want to restore your account at a later time, you will have to contact another Admin.</li>
				<li>If you want to delete the account permanently, please contact one of the other Admins.</li>
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
				<button class="btn btn-danger" type="submit">Deactivate Accounts</button>
			</div>
		</form>
	</div>
</div>
@endsection