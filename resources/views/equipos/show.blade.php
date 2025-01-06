@extends('layouts.app')

@section('title', 'Detalles del Equipo')

@section('content')
    <h1>Detalles del Equipo</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $equipo->modelo }}</h5>
            <p class="card-text"><strong>Marca:</strong> {{ $equipo->marca }}</p>
            <p class="card-text"><strong>Tipo:</strong> {{ $equipo->tipo }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $equipo->estado }}</p>
            <p class="card-text"><strong>Ubicación:</strong> {{ $equipo->ubicacion }}</p>
        </div>
    </div>

    <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-warning mt-3">Editar</a>
    <a href="{{ route('equipos.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
@endsection