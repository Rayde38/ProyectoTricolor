<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasajero extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pasajeros';

    protected $fillable = [
        'nombre', 'apellido', 'telefono', 'uid', 'estado', 'usuario_id',
    ];

    protected $casts = [
        'estado' => 'string',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function esperas()
    {
        return $this->hasMany(PasajeroEsperando::class);
    }

    public function avisos()
    {
        return $this->hasMany(AvisoPasajero::class);
    }

    public function historialBaneos()
    {
        return $this->hasMany(HistorialBaneo::class);
    }
}
