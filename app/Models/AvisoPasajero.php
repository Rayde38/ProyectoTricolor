<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AvisoPasajero extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'avisopasajero';

    protected $fillable = [
        'pasajero_id', 'chofer_id', 'mensaje', 'tipo', 'estado',
    ];

    protected $casts = [
        'tipo' => 'string',
        'estado' => 'string',
    ];

    public function pasajero()
    {
        return $this->belongsTo(Pasajero::class);
    }

    public function chofer()
    {
        return $this->belongsTo(Chofer::class);
    }
}
