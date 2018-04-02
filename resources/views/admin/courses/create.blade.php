@extends('admin.layouts.master')

@section('admin.content')

<div class="col-md-9">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Create Course
		</div>
		<div class="panel-body">
			<form method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="course_name">Course Name</label>
					<input type="text" name="name" class="form-control" placeholder="e.g: Botany" autofocus class="form-control" required>
				</div>
				<div class="form-group">
					<label for="year_id">Associated Year:</label>
					<select type="select" class="form-control" name="year_id" required>
						<option disabled selected>Select a Year...</option>
						@foreach ($years as $key => $value) {
							<option value="{{ $key }}">{{ $value }} Year</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<input type="submit" value="Submit" class="btn btn-success">
				</div>

				@include('errors.errors')

			</form>
		</div>
	</div>
</div>

@endsection
