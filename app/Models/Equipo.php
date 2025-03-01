<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo',
        'marca',
        'tipo',
        'estado',
        'ubicacion'
    ];

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }
}