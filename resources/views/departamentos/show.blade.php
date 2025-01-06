@extends('layouts.app')

@section('title', 'Detalles del Departamento')

@section('content')
    <h1>Detalles del Departamento</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $departamento->departamento}}</h5>
            <p class="card-text"><strong>Marca:</strong> {{ $departamento->descripcion }}</p>
            <p class="card-text"><strong>Tipo:</strong> {{ $departamento->nombre }}</p>
        </div>
    </div>

    <a href="{{ route('departamentos.edit', $departamento) }}" class="btn btn-warning mt-3">Editar</a>
    <a href="{{ route('departamentos.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
@endsection