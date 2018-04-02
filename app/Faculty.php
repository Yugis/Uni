<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function years()
    {
        return $this->belongsToMany(Year::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
