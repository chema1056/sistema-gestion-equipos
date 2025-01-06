<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;

    protected $table = 'asignaciones';

    protected $fillable = [
        'equipo_id',
        'departamento_id',
        'fecha_asignacion',
        'fecha_devolucion'
    ];

    protected $dates = [
        'fecha_asignacion',
        'fecha_devolucion'
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}