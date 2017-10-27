<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function instructors()
    {
        return $this->belongsToMany('App\instructor');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function years()
    {
        return $this->belongsToMany('App\Year');
    }
}
