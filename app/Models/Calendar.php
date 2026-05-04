<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'format_year',
        'view_calendar'
    ];

    

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
