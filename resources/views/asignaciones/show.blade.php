@extends('layouts.app')

@section('title', 'Detalles del Equipo')

@section('content')
    <h1>Detalles de la Asignacion</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $asignacion->equipo_id }}</h5>
            <p class="card-text"><strong>departamento:</strong> {{ $asignacion->asignacion_id }}</p>
            <p class="card-text"><strong>Fecha_asignacion:</strong> {{ $asignacion->fecha_asignacion }}</p>
            <p class="card-text"><strong>Fecha_devolucion</strong> {{ $asignacion->fecha_devolucion }}</p>
        </div>
    </div>

    <a href="{{ route('asignaciones.edit', $asignacion) }}" class="btn btn-warning mt-3">Editar</a>
    <a href="{{ route('asignaciones.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
@endsection