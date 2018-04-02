@extends('admin.layouts.master')

@section('admin.content')

<div class="col-md-9">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Uplaod a new schedule
		</div>

		<div class="panel-body">
			<form action="" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="avatar">Please Select A Photo of the Schedule</label>
					<input type="file" name="schedule" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="schedule">Is This A(n):</label>
					<select type="select" class="form-control" name="schedule_type" required>
						<option value="" selected disabled>Click to choose...</option>
						<option value="lecture_schedule">Lecture Schedule</option>
						<option value="exam_schedule">Exam Schedule</option>
					</select>
				</div>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Upload Schedule</button>
				</div>
			</form>
			<p style="color:rgb(43, 212, 24)">This will automatically send an informative email to all students in your faculty!</p>
		</div>
	</div>

	<div style="background-color: white; padding: 15px; margin-bottom: 10px;">		
		<h3>Lectures Schedule:</h3>
		@if(isset($faculty->lecture_schedule))
		<img src="{{ Storage::url($faculty->lecture_schedule) }}" width="100%" height="50%" style="background-color: ghostwhite;">
		@else
		<p>There is no schedule available yet, please try again later or try contacting your admin.</p>
		@endif

		<hr>

		<h3>Exams Schedule:</h3>
		@if(isset($faculty->exam_schedule))
		<img src="{{ Storage::url($faculty->exam_schedule) }}" width="100%" height="50%" style="background-color: ghostwhite;">
		@else
		<p>There is no exam schedule available yet, please try again later or try contacting your admin.</p>
		@endif
	</div>
</div>

@endsection