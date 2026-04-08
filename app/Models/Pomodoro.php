<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pomodoro extends Model
{
    protected $fillable = [
        'predetermined',
        'work_duration',
        'break_duration',
        'total_sessions',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
