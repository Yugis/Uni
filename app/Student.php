<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
  use Notifiable;

  protected $fillable = ['avatar'];

  protected $hidden = [
    'password', 'remember_token',
  ];

  public $with = ['secret_id'];

  public function faculty()
  {
    return $this->belongsTo('App\Faculty');
  }

  public function courses()
  {
    return $this->belongsToMany('App\Course')->withPivot('completed', 'finals', 'grades', 'attendance')->withTimestamps();
  }

  public function profile()
  {
    return $this->hasOne('App\Student_profile');
  }

  public function year()
  {
    return $this->belongsTo('App\Year');
  }

  public function isFollowing()
  {
    return $this->belongsToMany('App\Instructor', 'instructor_students')->withTimestamps();
  }

  public function secret_id()
  {
    return $this->morphMany('App\SecretIds', 'owner');
  }
}
