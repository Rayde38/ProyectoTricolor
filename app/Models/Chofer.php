<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chofer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'choferes';

    protected $fillable = [
        'nombre', 'apellido', 'telefono', 'ci', 'estado', 'usuario_id',
    ];

    protected $casts = [
        'estado' => 'string',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }

    public function viajes()
    {
        return $this->hasMany(Viaje::class);
    }

    public function disponibilidades()
    {
        return $this->hasMany(TransporteDisponible::class, 'chofer_id');
    }
}
