<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    protected $fillable = [
        'name',
        'faculty_id',
        'year_id',
        'description',
        'appointment',
        'room_id',
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
        return $this->belongsToMany(Student::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
