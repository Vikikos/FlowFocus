<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
    ];

    public function kanban()
    {
        return $this->belongsTo(Kanban::class, 'kanban_id');
    }
}
