<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perro extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'perros';

    protected $fillable = [
        'propietario_id',
        'conductor_id',
        'chip',
        'loe',
        'cartilla',
        'nombre_perro',
        'raza',
        'sexo',
        'pais',
        'numero_socio_propietario',
    ];

    /**
     * Relación con Propietario (Un Perro pertenece a un Propietario).
     */
    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }

    /**
     * Relación con Conductor (Un Perro pertenece a un Conductor).
     */
    public function conductor()
    {
        return $this->belongsTo(Conductor::class);
    }

    /**
     * Relación con Pruebas (Un Perro puede estar en muchas Pruebas).
     */
    public function pruebas()
    {
        return $this->belongsToMany(Prueba::class, 'perro_prueba');
    }
}

