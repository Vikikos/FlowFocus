<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'color_palette',
        'mode',
        'id_user',
        'mostrar_Widgets',
        'transparency',
        'font',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
