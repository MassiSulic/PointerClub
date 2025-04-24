<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $fillable = [	
        'titulo',
        'descripcion',
        'texto_destacado',
        'imagen1',
        'imagen2',
    ];
}
