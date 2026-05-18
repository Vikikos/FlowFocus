<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'view_calendar'
    ];

    

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function timeblocks()
    {
        return $this->hasMany(Timeblock::class, 'id_calendar');
    }
}
