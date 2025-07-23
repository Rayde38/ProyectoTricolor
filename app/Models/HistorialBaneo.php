<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Usuario;

class HistorialBaneo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'historialbaneo';

    protected $fillable = [
        'pasajero_id', 'usuario_id', 'motivo', 'fecha_baneo',
    ];

    protected $casts = [
        'fecha_baneo' => 'datetime',
    ];

    public function pasajero()
    {
        return $this->belongsTo(Pasajero::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
