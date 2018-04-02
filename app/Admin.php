<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = ['avatar'];

    protected $guard = 'admin';

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $dates = ['deleted_at'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function profile()
    {
        return $this->hasOne(Admin_profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function secret_id()
    {
        return $this->morphOne(SecretIds::class, 'owner');
    }

    public function getSecretId()
    {
        return $this->morphOne(SecretIds::class, 'owner')->first()->secret_id;
    }
}
