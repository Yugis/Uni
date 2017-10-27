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
      'room_id'
  ];

  public function faculty()
  {
    return $this->belongsTo('App\Faculty');
  }

  public function instructor()
  {
    return $this->belongsToMany('App\instructor');
  }

  public function students()
  {
    return $this->belongsToMany('App\Student');
  }
}
