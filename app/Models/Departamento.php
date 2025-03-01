<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion'];
    public function asignaciones()
    {
        return $this->hasMany(Asisnacion::class);
    }
}
