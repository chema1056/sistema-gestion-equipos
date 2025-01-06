@extends('layouts.app')

@section('title', 'Listado de Equipos')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h1>Listado de Equipos</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('equipos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nuevo Equipo
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Ubicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($equipos as $equipo)
                                <tr>
                                    <td>{{ $equipo->id }}</td>
                                    <td>{{ $equipo->modelo }}</td>
                                    <td>{{ $equipo->marca }}</td>
                                    <td>{{ $equipo->tipo }}</td>
                                    <td>
                                        <span class="badge bg-{{ $equipo->estado == 'disponible' ? 'success' : 'warning' }}">
                                            {{ ucfirst($equipo->estado) }}
                                        </span>
                                    </td>
                                    <td>{{ $equipo->ubicacion }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('equipos.show', $equipo) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('equipos.destroy', $equipo) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de que desea eliminar este equipo?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No hay equipos registrados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($equipos->hasPages())
                    <div class="card-footer">
                        {{ $equipos->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection