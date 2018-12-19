<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPerformance extends Model
{
    protected $table = 'users_performances';
    protected $fillable = ['status'];

    // relations

    public function user()
    {
        return $this->belongsTo(User::class)->orderBy('users.function');
    }

    // scopes

    public function scopeUnsure($query)
    {
        return $query->where('status', 'onzeker')->orWhere('status', 'onbekend');
    }
}
