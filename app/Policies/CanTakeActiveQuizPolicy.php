<?php

namespace App\Policies;

use Auth;
use App\Quiz;
use App\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class CanTakeActiveQuizPolicy
{
    use HandlesAuthorization;

    /**
    * Create a new policy instance.
    *
    * @return void
    */
    public function __construct()
    {
        //
    }

    public function view(Student $student, Quiz $quiz)
    {
        return in_array($student->id, $quiz->students()->get()->filter(function ($query) {
            return $query->pivot->completed == false;
        })->pluck('id')->toArray());
    }
}
