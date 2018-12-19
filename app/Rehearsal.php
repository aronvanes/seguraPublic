<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Rehearsal extends Model
{
    protected $table = 'rehearsals';

    protected $dates = [
        'created_at',
        'updated_at',
        'date',
    ];

    protected $fillable = [
        'date',
        'time',
        'status',
        'particularities',
    ];

    // relations

    public function rehearsalUsers()
    {
        return $this->hasMany(UserRehearsal::class);
    }

    public function activeRehearsalUsers()
    {
        return $this->rehearsalUsers()->where('users_rehearsals.status', 'wel');
    }

    // getters

    public function getDate()
    {
        return $this->date->format('d/m/Y');
    }

    public function getActiveUsersPercentage()
    {
        return round($this->activeRehearsalUsers->count() / $this->rehearsalUsers->count() * 100).' %';
    }

    public function getUsersGroupedByInstrument()
    {
        return $this->rehearsalUsers()->join('users', 'users.id', 'users_rehearsals.user_id')->select('users_rehearsals.*', 'users.function')->orderBy('users.function')->get();
    }

    // methods

    public function addUsers()
    {
        foreach(User::active()->get() as $user) {
            $userRehearsal = new UserRehearsal();
            $userRehearsal->rehearsal_id = $this->id;
            $userRehearsal->user_id = $user->id;
            $userRehearsal->status = 'wel';
            $userRehearsal->save();
        }
    }

    // scopes

    public function scopeFuture($query)
    {
        return $query->where('date', '>=', Carbon::yesterday());
    }
}
