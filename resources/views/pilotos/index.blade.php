@extends('layout.app')

@section('contenido')
<br>
<h1 class="text-center">Listado de Pilotos</h1>
<div class="container mt-4">
    <div class="mx-auto" style="max-width: 1000px;">
        <div class="text-right">
            <a href="{{ route('pilotos.create') }}" class="btn btn-primary">
                Agregar nuevo Piloto
            </a>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Coordenada N°1</th>
                        <th>Coordenada N°2</th>
                        <th>Coordenada N°3</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($piloto as $pilotoTemporal)
                    <tr>
                        <td>{{ $pilotoTemporal->cedula }}</td>
                        <td>{{ $pilotoTemporal->nombre }}</td>
                        <td>Latitud: {{ $pilotoTemporal->latitud1 }}<br>Longitud: {{ $pilotoTemporal->longitud1 }}<br>Hora: {{ $pilotoTemporal->hora1 }}</td>
                        <td>Latitud: {{ $pilotoTemporal->latitud2 }}<br>Longitud: {{ $pilotoTemporal->longitud2 }}<br>Hora: {{ $pilotoTemporal->hora2 }}</td>
                        <td>Latitud: {{ $pilotoTemporal->latitud3 }}<br>Longitud: {{ $pilotoTemporal->longitud3 }}<br>Hora: {{ $pilotoTemporal->hora3 }}</td>
                        <td class="text-center">

                            <form action="{{ route('pilotos.destroy', $pilotoTemporal->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este predio?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay pilotos registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
