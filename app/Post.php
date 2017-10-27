<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public $with = ['instructor'];

  protected $fillable = ['body', 'instructor_id'];

  public function instructor()
  {
    return $this->belongsTo('App\Instructor');
  }
}
