<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_profile extends Model
{
    protected $fillable = ['admin_id', 'about'];

    public function admin()
    {
        return $this->belongsTo(Admin::clas);
    }
}
