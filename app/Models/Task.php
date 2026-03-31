<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'state',
        'expiration_date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
