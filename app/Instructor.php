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
    return $this->belongsToMany('App\Faculty');
  }

  public function courses()
  {
    return $this->belongsToMany('App\Course');
  }

  public function profile()
  {
    return $this->hasOne('App\Instructor_profile');
  }

  public function posts()
  {
    return $this->hasMany('App\Post');
  }

  public function followers()
  {
    return $this->belongsToMany('App\Student', 'instructor_students')->withTimestamps();
  }

  public function secret_id()
  {
    return $this->hasOne('App\SecretIds');
  }

  public function coursesPerFaculty($id)
  {
   return $this->courses()->where('faculty_id', $id)->pluck('name')->toArray();
  }
}
