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
}
