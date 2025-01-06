@extends('layouts.app')

@section('title', 'Crear Departamento')

@section('content')
    <h1>Crear Nuevo Departamento</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('departamentos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="descripcion" class="form-label">descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required value="{{ old('descripcion') }}">
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required value="{{ old('nombre') }}">
        </div>
        <button type="submit" class="btn btn-primary">Crear Departamento</button>
    </form>
@endsection