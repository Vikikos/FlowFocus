<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timeblock extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start',
        'end',
        'color'
    ];

    protected $hidden = [
        'id_calendar',
        'created_at',
        'updated_at'
    ];

    public function calendar(): BelongsTo
    {
        return $this->belongsTo(Calendar::class, 'id_calendar');
    }
}
