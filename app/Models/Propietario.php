<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propietario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'propietarios';

    protected $fillable = [
        'identificacion',
        'nombre',
        'apellido',
        'numero_socio',
        'direccion',
        'region',
        'pais',
        'email',
        'telefono',
    ];

    /**
     * Relación con Perros (Un Propietario tiene muchos Perros).
     */
    public function perros()
    {
        return $this->hasMany(Perro::class);
    }
}