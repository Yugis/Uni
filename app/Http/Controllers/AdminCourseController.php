<?php

namespace App\Http\Controllers;

use App\Year;
use App\Course;
use App\Student;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth:admin']);
	}

	public function create()
	{
		$years = Year::pluck('name', 'id');

		return view('admin.courses.create', compact('years'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|string|max:50|min:3',
			'year_id' => 'required|integer'
		]);

		$students = Student::where('year_id', $request->year_id)->pluck('id');
        $faculty = auth()->user()->faculty;
        $year = Year::where('id', $request->year_id)->first();

        $course = Course::create(['name' => $request->name, 'slug' => str_slug($request->name, '-'), 'faculty_id' => $faculty->id, 'year_id' => $year->id]);

        $course->students()->sync($students);

        \Session::flash('success', 'Created Course: ' . $course->name . ' Successfully!');

        return redirect()->back();
	}

	public function showCourse($slug)
	{
		$course = Course::whereSlug($slug)
		->with(['students.faculty', 'students.quizzes'])
		->with('quizzes')
		->first();

		if(!$this->adminCanViewCourse($course)) {
			\Session::flash('fail', 'Unauthorized');
			return redirect()->back();
		}

		return view('admin.courses.show', compact('course', 'quizzes'));
	}

	public function edit($slug)
	{
		$course = Course::whereSlug($slug)->with('year')->first();
		$years = year::pluck('name', 'id')->reject(function ($value, $key) use ($course) {
            return $value == $course->year->name;
        });

		return view('admin.courses.edit', compact('course', 'years'));
	}

	public function update(Request $request, $slug)
	{
		$course = Course::whereSlug($slug)->first();

		$this->validate($request, [
			'name' 		  	 => 'required|string|unique:courses,name,'.$course->id,
			'description' 	 => 'required|string',
			'room_id' 	  	 => 'required|string',
			'finals_mark' 	 => 'required|integer|max:250|digits_between:0,3',
			'total_grades'   => 'required|integer|max:250|digits_between:0,3',
			'max_attendance' => 'required|integer|max:50|digits_between:0,2',
			'year_id' 		 => 'required|integer'
		]);

		$course->update([
			'name' => $request->name,
			'description' => $request->description,
			'room_id' => $request->room_id,
			'finals_mark' => $request->finals_mark,
			'total_grades' => $request->total_grades,
			'max_attendance' => $request->max_attendance,
			'slug' => str_slug($request->name, '-')
		]);

		if($course->year_id !== $request->year_id) {
			$students_ids = Student::where('year_id', $request->year_id)->pluck('id');

			$course->students()->sync($students_ids);

			$course->update(['year_id' => $request->year_id]);
		}

		\Session::flash('success', 'Course Updated!');

		return redirect()->route('admin.edit.course', ['slug' => $course->slug]);
	}

	public function updateScores(Request $request, $slug)
	{
		$student = Student::findOrFail($request->student['id']);
		$course = Course::whereSlug($slug)->first();

		foreach ($request->quizzes as $quiz) {
			$score = $quiz['pivot']['score'];
			$pivot = $student->quizzes()->whereQuizName($quiz['quiz_name'])->where('course_id', $course->id)->first()->pivot;
			$pivot->score = $score;
			$pivot->save();
		}

		$pivot = $student->courses()->where('course_id', $course->id)->first()->pivot;
		$pivot->attendance = $request->attendance;
		$pivot->save();

		return ['status' => 'Updated'];
	}

	public function getCourseStudents($slug)
	{
		$course = Course::whereSlug($slug)->with('students.quizzes')->first();

		$students = $course->students()->with(['quizzes'=> function($query) use ($course) {
			$query->where('course_id', $course->id);
		}])->orderBy('first_name', 'asc')->get();

		return $students;
	}

	private function adminCanViewCourse(Course $course) {
		return auth()->user()->faculty_id == $course->faculty_id;
	}
}
