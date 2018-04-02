@extends('admin.layouts.master')

@section('admin.content')

<div class="col-md-9">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Send an Email to students of a specific year.
		</div>

		<div class="panel-body">
			<form action="{{ route('admin.send.class.mail') }}" method="post">
				{{ csrf_field() }}
				
				<div class="form-group">
					<label for="year_id">Class</label>
					<select id="year_id" type="select" class="form-control" name="year_id" required>
						<option value="" disabled selected>Select a year to send the email to...</option>
						@foreach ($years as $year) {
							<option value="{{ $year->id }}">{{ $year->name }} Year</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="subject">Subject(Optional):</label>
					<input type="text" name="subject" placeholder="Please specifiy a subject..." class="form-control">
				</div>

				<div class="form-group">
					<label for="message">Message body:</label>
					<textarea name="body" id="summernote" cols="30" rows="5" class="form-control" required></textarea>
				</div>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Send</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('admin.scripts')
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
	<script>
		$(document).ready(function() {
		  $('#summernote').summernote({
		  	 height: 200,
	  	   	 placeholder: 'Compose Email...',
	  	   	 disableDragAndDrop: true,
	  	   	 toolbar: [
			    ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
			    ['font', ['strikethrough', 'superscript', 'subscript']],
			    ['fontsize', ['fontsize']],
			    ['color', ['color']],
			    ['para', ['ul', 'ol', 'paragraph']],
			    ['height', ['height']],
			    ['insert', ['picture', 'link', 'hr']]
			  ]
		  });
		});
	</script>
@endsection