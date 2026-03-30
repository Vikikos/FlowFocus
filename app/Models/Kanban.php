<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kanban extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Tarea::class, 'kanban_id');
    }
}
