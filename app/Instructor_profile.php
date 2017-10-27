<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor_profile extends Model
{
    protected $fillable = ['instructor_id', 'location', 'about', 'facebook_link', 'twitter_link', 'instagram_link'];

  public function instructor()
  {
    return $this->belongsTo('App\Instructor');
  }
}
