<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';
    protected $guarded = ['id', 'performance_id'];

    // relations

    public function performance()
    {
        return $this->belongsTo(Performance::class);
    }

    // queries

    public static function getPerformanceContract($performance_id)
    {
        return Self::where('performance_id', $performance_id)->first();
    }
}
