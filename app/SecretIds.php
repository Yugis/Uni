<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecretIds extends Model
{
  protected $guarded = [];

  public $timestamps = false;

  public function owner()
  {
    return $this->morphTo();
  }
}
