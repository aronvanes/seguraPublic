<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRehearsal extends Model
{
    protected $table = 'users_rehearsals';

    // relations

    public function user()
    {
        return $this->belongsTo(User::class)->orderBy('users.function');
    }

    // scopes

    public function scopeJoinUsers($query)
    {
        return $query->join('users', 'users_rehearsals.user_id', 'users.id');
    }
}
