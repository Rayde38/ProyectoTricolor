<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistroDemanda extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'registrodemanda';

    protected $fillable = [
        'pasajero_id', 'tramo', 'fecha_hora',
    ];

    protected $casts = [
        'fecha_hora' => 'datetime',
    ];

    public function pasajero()
    {
        return $this->belongsTo(Pasajero::class);
    }
}
