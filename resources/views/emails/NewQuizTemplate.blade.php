<!DOCTYPE html>
<html lang="en">
<head>
	<title>Akhbar El Youm Academy</title>
	
	A new Quiz was just created for this course: {{ $course->name }}
	<br>
	<a class="btn btn-primary" href="{{ route('take.quiz', ['slug' => $course->slug, 'quiz_name' => $quiz->quiz_name ]) }}">Click Here To Start The Quiz!</a>
</head>
<body>
	
</body>
</html>