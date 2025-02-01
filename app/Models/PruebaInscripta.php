<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaInscripta extends Model
{
    use HasFactory;

    protected $table = 'pruebas_inscriptas';

    protected $fillable = [
        'user_id',
        'prueba',
        'fecha',
        'perro',
        'valor',
        'pago',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function perroModel()
{
    // belongsTo(Model, 'foreign_key', 'owner_key')
    // foreign_key = el campo en prueba_inscriptas (perro) 
    // owner_key   = el campo en perros (nombre_perro)
    return $this->belongsTo(Perro::class, 'perro', 'nombre_perro');
}

}
