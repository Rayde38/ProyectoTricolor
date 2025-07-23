<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Viaje extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'viajes';

    protected $fillable = [
        'chofer_id', 'turno_id', 'tramo', 'estado', 'inicio', 'fin',
    ];

    protected $casts = [
        'inicio' => 'datetime',
        'fin' => 'datetime',
        'estado' => 'string',
    ];

    public function chofer()
    {
        return $this->belongsTo(Chofer::class);
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }
}
