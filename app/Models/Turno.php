<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turno extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'turnos';

    protected $fillable = [
        'chofer_id', 'fecha', 'estado',
    ];

    protected $casts = [
        'fecha' => 'date',
        'estado' => 'string',
    ];

    public function chofer()
    {
        return $this->belongsTo(Chofer::class);
    }

    public function viajes()
    {
        return $this->hasMany(Viaje::class);
    }
}
