<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecretIds extends Model
{
  protected $fillable = ['id', 'instructor_id', 'student_id'];

  public $timestamps = false;

  public function student()
  {
    return $this->belongsTo('App\Student');
  }

  public function instructor()
  {
    return $this->belongsTo('App\Instructor');
  }
}
