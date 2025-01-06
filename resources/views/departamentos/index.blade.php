@extends('layouts.app')

@section('title', 'Listado de Equipos')

@section('content')
    <h1>Listado de Equipos</h1>
    <a href="{{ route('departamentos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Departamento</a>

    <form action="{{ route('departamentos.index') }}" method="GET" class="mb-3">
        <div class="row g-3">
            <div class="col-md-3">
                <input type="text" class="form-control" name="nombre" placeholder="Filtrar por nombre" value="{{ request('nombre') }}">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="descripcion" placeholder="Filtrar por descripcion" value="{{ request('descripcion') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
            </div>
        </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>descripcion</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departamentos as $departamento)
                <tr>
                    <td>{{ $departamento->descripcion }}</td>
                    <td>{{ $departamento->Nombre}}</td>
                    <td>
                        <a href="{{ route('departamentos.show', $departamento) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('departamentos.edit', $departamento) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('departamentos.destroy', $departamento) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este departamento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $departamentos->links() }}
@endsection