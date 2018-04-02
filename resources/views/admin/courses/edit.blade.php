@extends('layouts.app')

@section('content')



<div class="container" id="admin-dashboard-heading">
	<h1> {{ $course->name }} </h1>
	<p>Edit Page</p>
</div>

<div class="container">
	<div class="col-md-8 col-md-offset-2">

		<div class="panel panel-primary">
			<div class="panel-heading">
				Edit Course
			</div>
			<div class="panel-body">
				<form action="" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" name="name" value="{{ $course->name }}" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea name="description" cols="5" rows="3" class="form-control" required>{{ $course->description }}</textarea>
					</div>
					<div class="form-group">
						<label for="room_id">Room Number:</label>
						<input type="text" name="room_id" value="{{ $course->room_id }}" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="finals_mark">Finals Mark:</label>
						<input type="number" min="0" step="1" name="finals_mark" value="{{ $course->finals_mark }}" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="total_grades">Total Grades:</label>
						<input type="number" min="0" step="1" name="total_grades" value="{{ $course->total_grades }}" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="max_attendance">Number of Lectures Held:</label>
						<input type="text" min="0" step="1" name="max_attendance" value="{{ $course->max_attendance }}" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="year_id">Associated Year:</label>
						<select type="select" class="form-control" name="year_id" required>
							<option value="{{ $course->year_id }}" selected>{{ $course->year->name }}</option>
							@foreach ($years as $key => $value) {
								<option value="{{ $key }}">{{ $value }} Year</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-success" type="submit">Update Profile</button>
					</div>

					@include('errors.errors')
					
				</form>
			</div>
		</div>
	</div>
</div>
@endsection