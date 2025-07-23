<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransporteDisponible extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transportedisponible';

    protected $fillable = [
        'chofer_id', 'parada', 'estado', 'hora_disponible',
    ];

    protected $casts = [
        'hora_disponible' => 'datetime',
        'estado' => 'string',
    ];

    public function chofer()
    {
        return $this->belongsTo(Chofer::class);
    }
}
