<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conductor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'conductores';

    protected $fillable = [
        'identificacion',
        'nombre',
        'apellido',
        'pais',
        'email',
        'telefono',
    ];

    /**
     * Relación con Perros (Un Conductor tiene muchos Perros).
     */
    public function perros()
    {
        return $this->hasMany(Perro::class);
    }
}
