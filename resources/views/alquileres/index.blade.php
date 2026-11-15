@extends('layouts/main')

@section('titulo', 'Alquileres')

@section('contenido')

    <div class="d-flex justify-content-between mb-3">
        <h1 class="text-danger">Alquileres</h1>
        <div>
            <a href="{{ route('alquileres.create') }}" class="btn btn-outline-success">Nuevo alquiler</a>
        </div>
    </div>

    @include('partials.buscador', ['ruta' => 'alquileres.index'])

    <table class="table table-striped bg-warning table-hover">
        <thead class="bg-danger text-white">
            <tr>
                @include('partials.th-sort', ['ruta' => 'alquileres.index', 'campo' => 'id_alquiler', 'etiqueta' => 'ID'])
                <th>Cliente</th>
                <th>Auto</th>
                @include('partials.th-sort', ['ruta' => 'alquileres.index', 'campo' => 'fecha_inicio', 'etiqueta' => 'Inicio'])
                @include('partials.th-sort', ['ruta' => 'alquileres.index', 'campo' => 'fecha_fin', 'etiqueta' => 'Fin'])
                <th></th>
            </tr>
        </thead>
        <tbody >
            @forelse ($alquileres as $alquiler)
                <tr>
                    <td>{{ $alquiler->id_alquiler }}</td>
                    <td>{{ $alquiler->cliente->apellido }} {{ $alquiler->cliente->nombre }}</td>
                    <td>{{ $alquiler->auto->marca }} {{ $alquiler->auto->modelo }}</td>
                    <td>{{ $alquiler->fecha_inicio }}</td>
                    <td>{{ $alquiler->fecha_fin }}</td>
                    <td class="text-end">
                        <a href="{{ route('alquileres.edit', $alquiler) }}" class="btn btn-outline-light">Editar</a>
                        <form action="{{ route('alquileres.destroy', $alquiler) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este alquiler?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay alquileres.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $alquileres->withQueryString()->links('pagination::bootstrap-5') }}
@endsection
