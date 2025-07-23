<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PasajeroEsperando extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pasajeroesperando';

    protected $fillable = [
        'pasajero_id', 'tramo', 'estado', 'hora_espera',
    ];

    protected $casts = [
        'hora_espera' => 'datetime',
        'estado' => 'string',
    ];

    public function pasajero()
    {
        return $this->belongsTo(Pasajero::class);
    }
}
