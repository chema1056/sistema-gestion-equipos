@extends('layouts.app')

@section('title', 'Listado de Asignaciones')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h1>Listado de Asignaciones</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('asignaciones.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nueva Asignación
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
                                <th>Equipo</th>
                                <th>Departamento</th>
                                <th>Fecha Asignación</th>
                                <th>Fecha Devolución</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($asignaciones as $asignacion)
                                <tr>
                                    <td>{{ $asignacion->id }}</td>
                                    <td>
                                        {{ $asignacion->equipo->marca }} - 
                                        {{ $asignacion->equipo->modelo }}
                                    </td>
                                    <td>{{ $asignacion->departamento->nombre }}</td>
                                    <td>{{ $asignacion->fecha_asignacion->format('d/m/Y') }}</td>
                                    <td>
                                        {{ $asignacion->fecha_devolucion ? $asignacion->fecha_devolucion->format('d/m/Y') : 'No devuelto' }}
                                    </td>
                                    <td>
                                        @if($asignacion->fecha_devolucion)
                                            <span class="badge bg-success">Devuelto</span>
                                        @else
                                            <span class="badge bg-primary">Activo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('asignaciones.show', $asignacion) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('asignaciones.edit', $asignacion) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('asignaciones.destroy', $asignacion) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de que desea eliminar esta asignación?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No hay asignaciones registradas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($asignaciones->hasPages())
                    <div class="card-footer">
                        {{ $asignaciones->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection