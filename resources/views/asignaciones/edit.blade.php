@extends('layouts.app')

@section('title', 'Editar Asignacion')

@section('content')
    <h1>Editar Asignacion</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('asignacion.update', $asignacion) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="equipo_id" class="form-label">Equipo_id</label>
            <input type="text" class="form-control" id="equipo_id" name="equipo_id" required value="{{ old('equipo_id', $asignacion->equipo_id) }}">
        </div>
        <div class="mb-3">
            <label for="departamento_id" class="form-label">Departamento_id</label>
            <input type="text" class="form-control" id="departamento_id" name="departamento_id" required value="{{ old('departamento_id', $asignacion->departamento_id) }}">
        </div>
        <div class="mb-3">
            <label for="fecha_asignacion" class="form-label">Fecha_asignacion</label>
            <input type="text" class="form-control" id="fecha_asignacion" name="fecha_asignacion" required value="{{ old('fecha_asignacion', $asignacion->fecha_asignacion) }}">
        </div>
        <div class="mb-3">
            <label for="fecha_devolucion" class="form-label">Fecha_devolucion</label>
            <input type="text" class="form-control" id="fecha_devolucion" name="fecha_devolucion" required value="{{ old('fecha_devolucion', $asignacion->fecha_devolucion) }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Asignacion</button>
    </form>
@endsection