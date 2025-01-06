<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Departamento;
use App\Models\Asignacion;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEquipos = Equipo::count();
        $equiposDisponibles = Equipo::where('estado', 'disponible')->count();
        $equiposAsignados = Equipo::where('estado', 'asignado')->count();
        $totalDepartamentos = Departamento::count();
        $asignacionesActivas = Asignacion::whereNull('fecha_devolucion')->count();

        $equiposPorTipo = Equipo::select('tipo', \DB::raw('count(*) as total'))
            ->groupBy('tipo')
            ->get();

        return view('dashboard', compact(
            'totalEquipos',
            'equiposDisponibles',
            'equiposAsignados',
            'totalDepartamentos',
            'asignacionesActivas',
            'equiposPorTipo'
        ));
    }
}
