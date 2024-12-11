<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prueba extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pruebas';

    protected $fillable = [
        'nombre_prueba',
        'fecha',
        'lugar',
        'disciplina',
        'nombre_juez_1',
        'nombre_juez_2',
        'nombre_juez_3',
    ];

    /**
     * Relación con Perros (Una Prueba tiene muchos Perros).
     */
    public function perros()
    {
        return $this->belongsToMany(Perro::class, 'perro_prueba');
    }
}
