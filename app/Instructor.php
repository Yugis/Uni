<?php

namespace App;

use App\Course;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Instructor extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['avatar'];

    protected $guard = 'instructor';

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function faculties()
    {
        return $this->belongsToMany(Faculty::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function profile()
    {
        return $this->hasOne(Instructor_profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function followers()
    {
        return $this->belongsToMany(Student::class, 'instructor_students')->withTimestamps();
    }

    public function secret_id()
    {
        return $this->morphOne(SecretIds::class, 'owner');
    }

    public function getSecretId()
    {
        return $this->morphOne(SecretIds::class, 'owner')->first()->secret_id;
    }

    public function coursesPerFaculty($id)
    {
        return $this->courses()->where('faculty_id', $id)->get();
    }
}
