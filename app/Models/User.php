<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use TwoFactorAuthenticatable;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'avatar',
    ];

    // The attributes that should be hidden for arrays.
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Set username attribute to lowercase.
    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }

    // Generate user avatar url.
    public function getAvatarAttribute($value): string
    {
        if (!$value) return asset('images/avatars/avatar0.png');

        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            return Storage::url('avatars/'.$value);
        }

        return $value;
    }
}
