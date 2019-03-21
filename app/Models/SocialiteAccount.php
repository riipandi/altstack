<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialiteAccount extends Model
{
    protected $fillable = [
        'user_id', 'provider_user_id', 'provider',
    ];

    /**
     * Relation with user table.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
