<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class PasswordHistory extends Model
{
    protected $guarded = [];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function post()
    {
        return $this->belongsTo('App\Models\User');
    }
}
