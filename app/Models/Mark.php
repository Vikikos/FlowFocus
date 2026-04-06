<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $table = 'mark';

    protected $fillable = [
        'title',
        'content',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
