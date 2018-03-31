<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = [
        'name',
    ];

    public function faculties()
    {
        return $this->belongsToMany('App\Faculty');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
