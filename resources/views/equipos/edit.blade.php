@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
    <h1>Editar Equipo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('equipos.update', $equipo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required value="{{ old('modelo', $equipo->modelo) }}">
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" required value="{{ old('marca', $equipo->marca) }}">
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" required value="{{ old('tipo', $equipo->tipo) }}">
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" id="estado" name="estado" required>
                <option value="disponible" {{ old('estado', $equipo->estado) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="asignado" {{ old('estado', $equipo->estado) == 'asignado' ? 'selected' : '' }}>Asignado</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" required value="{{ old('ubicacion', $equipo->ubicacion) }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Equipo</button>
    </form>
@endsection