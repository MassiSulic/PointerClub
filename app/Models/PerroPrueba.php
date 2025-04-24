<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerroPrueba extends Model
{
    use HasFactory;

    protected $table = 'perro_prueba';

    protected $fillable = [
        'perro_id',
        'prueba_id',
    ];

    /**
     * Relación con Perro (Muchos a Muchos).
     */
    public function perro()
    {
        return $this->belongsTo(Perro::class);
    }

    /**
     * Relación con Prueba (Muchos a Muchos).
     */
    public function prueba()
    {
        return $this->belongsTo(Prueba::class);
    }
}

