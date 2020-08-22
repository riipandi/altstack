<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name', 'email', 'username', 'password', 'avatar',
    ];

    // The attributes that should be hidden for arrays.
    protected $hidden = [
        'password', 'remember_token',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Get user first name.
    public function getFirstNameAttribute()
    {
        $parser = new \TheIconic\NameParser\Parser();
        $name = $parser->parse($this->name);

        return $name->getFirstname();
    }

    // Get created date attribute.
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d F Y H:i');
    }

    // Get updated date attribute.
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])
            ->locale(config('app.locale'))
            ->diffForHumans();
    }

    // Get user avatar url.
    public function getAvatarAttribute($value)
    {
        if (!$value) {
            return asset('images/default-avatar.png');
        }

        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            return Storage::url('avatars/'.$value);
        }

        return $value;
    }

    // Set username attribute to lowercase.
    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }
}
