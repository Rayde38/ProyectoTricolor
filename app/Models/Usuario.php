<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre', 'email', 'password', 'rol', 'estado',
    ];

    protected $casts = [
        'rol' => 'string',
        'estado' => 'string',
    ];

    public function chofer()
    {
        return $this->hasOne(Chofer::class);
    }

    public function pasajero()
    {
        return $this->hasOne(Pasajero::class);
    }

    public function baneos()
    {
        return $this->hasMany(HistorialBaneo::class);
    }
}
