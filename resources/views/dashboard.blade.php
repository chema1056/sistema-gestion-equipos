@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total de Equipos</h5>
                    <p class="card-text display-4">{{ $totalEquipos }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Equipos Disponibles</h5>
                    <p class="card-text display-4">{{ $equiposDisponibles }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Equipos Asignados</h5>
                    <p class="card-text display-4">{{ $equiposAsignados }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total de Departamentos</h5>
                    <p class="card-text display-4">{{ $totalDepartamentos }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Asignaciones Activas</h5>
                    <p class="card-text display-4">{{ $asignacionesActivas }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Equipos por Tipo</h5>
                    <canvas id="equiposPorTipoChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('equiposPorTipoChart').getContext('2d');
        var equiposPorTipo = @json($equiposPorTipo);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: equiposPorTipo.map(item => item.tipo),
                datasets: [{
                    label: 'Cantidad de Equipos',
                    data: equiposPorTipo.map(item => item.total),
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    });
</script>
@endsection