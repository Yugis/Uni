<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'room_id',
        'finals_mark',
        'total_grades',
        'max_attendance',
        'year_id',
        'faculty_id',
        'slug'
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function instructor()
    {
        return $this->belongsToMany(instructor::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)->withPivot('completed', 'finals', 'grades', 'attendance')->withTimestamps();
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
}
