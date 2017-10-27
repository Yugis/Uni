<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_profile extends Model
{
  protected $fillable = ['student_id', 'location', 'about', 'facebook_link', 'twitter_link', 'instagram_link'];

  public function student()
  {
    return $this->belongsTo('App\Student');
  }
}
