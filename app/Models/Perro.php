<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Perro extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'perros';

    protected $fillable = [
        'user_id',
        'propietario',
        'conductor',
        'fecha_nacimiento',
        'microchip', //hacer obligatorio
        'libro_de_origenes', //hacer obligatorio
        'cartilla_de_trabajo',
        'nombre_perro',
        'raza',
        'sexo',
        'pais',
    ];

    /**
     * Relación con Propietario (Un Perro pertenece a un Propietario).
     */
    public function propietario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Relación con Pruebas (Un Perro puede estar en muchas Pruebas).
     */
    public function pruebas()
    {
        return $this->belongsToMany(Prueba::class, 'perro_prueba');
    }
}

