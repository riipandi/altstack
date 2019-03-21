<?php

namespace App\Models;

use App\Traits\UlidKey;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use Notifiable;
    use SoftDeletes;
    use UlidKey;

    // protected $appends = ['avatar_url'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ulid',
        'name',
        'email',
        'password',
        'email_verified_at',
        'username',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * This method will encrypt all password fields.
     *
     * @return string
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Generate user avatar url.
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        if (!$this->avatar) {
            return asset('img/avatar-64.png');
        } elseif (!filter_var($this->avatar, FILTER_VALIDATE_URL)) {
            return Storage::url('avatars/'.$this->avatar);
        } else {
            return $this->avatar;
        }
    }

    /**
     * Get user full name.
     *
     * @return string
     */
    public function getFirstNameAttribute()
    {
        $parser = new \TheIconic\NameParser\Parser();
        $name = $parser->parse($this->name);

        return $name->getFirstname();
    }

    /**
     * Implementing password history.
     *
     * @return void
     */
    public function passwordHistories()
    {
        return $this->hasMany('App\Models\PasswordHistory');
    }
}
