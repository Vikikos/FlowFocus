<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'state',
        'expiration_date',
        'column'
    ];

    public function kanban(): BelongsTo
    {
        return $this->belongsTo(Kanban::class);
    }

}
