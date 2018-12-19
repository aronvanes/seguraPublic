<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $table = 'performances';
    protected $guarded = ['id'];
    protected $dates = [
        'created_at',
        'updated_at',
        'date',
        'deadline'
    ];

    // relations

    public function contract()
    {
        return $this->hasOne(Contract::class);
    }

    public function mails()
    {
        return $this->hasMany(Mail::class);
    }

    public function performanceUsers()
    {
        return $this->hasMany(UserPerformance::class);
    }

    // getters

    public function getDate()
    {
        return $this->date->format('d/m/Y');
    }

    public function getDeadline()
    {
        return $this->deadline->format('d/m/Y');
    }

    public function getUsersGroupedByInstrument()
    {
        return $this->performanceUsers()->join('users', 'users.id', 'users_performances.user_id')->select('users_performances.*', 'users.function')->orderBy('users.function')->get();
    }

    // methods

    public function addUsers()
    {
        foreach(User::active()->get() as $user) {
            $userPerformance = new UserPerformance();
            $userPerformance->performance_id = $this->id;
            $userPerformance->user_id = $user->id;
            $userPerformance->status = 'onbekend';
            $userPerformance->save();
        }
    }

    // scopes

    public function scopeFuture($query)
    {
        return $query->where('date', '>=', Carbon::now());
    }
    public function scopePast($query)
    {
        return $query->where('date', '<=', Carbon::now());
    }

    public function scopeAlmostDeadline($query)
    {
        return $query->future()->where('date', '<=', Carbon::now()->addWeek());
    }
}
