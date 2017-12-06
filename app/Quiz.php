<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = ['active'];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function faculties()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)->withPivot('completed');
    }

    public function determineName($slug)
    {
        $course = \App\Course::whereSlug($slug)->first();
        $faculty = \App\Faculty::where('name', $course->faculty->name)->first();
        $lastQuiz = \App\Quiz::where(['course_id' => $course->id, 'faculty_id' => $faculty->id])->count();
        $lastQuiz += 1;

        return 'quiz-' . $lastQuiz;
    }

    public static function getActiveQuiz($user)
    {
        $user = \Auth::user();
        return static::where(['faculty_id' => $user->faculty_id, 'active' => true])
                    ->whereIn('course_id', $user->courses()->pluck('course_id')->toArray())->get();
    }
}
