<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = ['active'];

    public $with = ['course', 'faculty'];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)->withPivot('completed', 'score');
    }

    public function syncStudents()
    {
        $course = \App\Course::where(['id' => $this->course_id, 'faculty_id' => $this->faculty_id])->first();

        foreach($course->students as $student) {
            $this->students()->syncWithoutDetaching([$student->id]);
        }
    }

    public function determineName($slug)
    {
        $course = \App\Course::whereSlug($slug)->first();
        $faculty = \App\Faculty::whereName($course->faculty->name)->first();
        $lastQuiz = \App\Quiz::where(['course_id' => $course->id, 'faculty_id' => $faculty->id])->count();
        $lastQuiz += 1;

        return 'quiz-' . $lastQuiz;
    }

    public static function getActiveQuiz($course_id = [])
    {
        $user = \Auth::user();
        $requiredCourseId = $course_id ?: $user->courses()->pluck('course_id')->toArray();

        return static::where(['faculty_id' => $user->faculty_id, 'active' => true])
        ->whereIn('course_id', $requiredCourseId)->latest()->get();
    }
}
