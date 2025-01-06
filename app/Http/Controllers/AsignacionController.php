<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Equipo;
use App\Models\Departamento;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    public function index()
    {
        $asignaciones = Asignacion::with(['equipo', 'departamento'])->paginate(10);
        return view('asignaciones.index', compact('asignaciones'));
    }

    public function create()
    {
        $equipos = Equipo::where('estado', 'disponible')->get();
        $departamentos = Departamento::all();
        return view('asignaciones.create', compact('equipos', 'departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'fecha_asignacion' => 'required|date',
        ]);

        $asignacion = Asignacion::create($request->all());
        
        // Actualizar el estado del equipo
        $equipo = Equipo::find($request->equipo_id);
        $equipo->estado = 'asignado';
        $equipo->save();

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignación creada exitosamente.');
    }

    public function show(Asignacion $asignacion)
    {
        return view('asignaciones.show', compact('asignacion'));
    }

    public function edit(Asignacion $asignacion)
    {
        $equipos = Equipo::all();
        $departamentos = Departamento::all();
        return view('asignaciones.edit', compact('asignacion', 'equipos', 'departamentos'));
    }

    public function update(Request $request, Asignacion $asignacion)
    {
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'fecha_asignacion' => 'required|date',
        ]);

        $asignacion->update($request->all());

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignación actualizada exitosamente.');
    }

    public function destroy(Asignacion $asignacion)
    {
        // Liberar el equipo
        $equipo = $asignacion->equipo;
        $equipo->estado = 'disponible';
        $equipo->save();

        $asignacion->delete();

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignación eliminada exitosamente.');
    }
}