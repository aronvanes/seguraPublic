<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $table = 'mails';

    protected $dates = [
        'created_at',
        'updated_at',
        'date',
    ];

    // relations

    public function performance()
    {
        return $this->belongsTo(Performance::class);
    }

    // methods

    public function getDate()
    {
        return $this->date->format('d/m/Y');
    }
}
