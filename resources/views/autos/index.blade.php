@extends('layouts/main')

@section('titulo', 'Autos')

@section('contenido')
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3">Autos</h1>
        <div>
            <a href="{{ route('alquileres.index') }}" class="btn btn-outline-secondary">Volver</a>
            <a href="{{ route('autos.create') }}" class="btn btn-success">Nuevo auto</a>
        </div>
    </div>

    @include('partials.buscador', ['ruta' => 'autos.index'])

    <table class="table table-striped bg-white">
        <thead>
            <tr>
                @include('partials.th-sort', ['ruta' => 'autos.index', 'campo' => 'id_auto', 'etiqueta' => 'ID'])
                @include('partials.th-sort', ['ruta' => 'autos.index', 'campo' => 'marca', 'etiqueta' => 'Marca'])
                @include('partials.th-sort', ['ruta' => 'autos.index', 'campo' => 'modelo', 'etiqueta' => 'Modelo'])
                @include('partials.th-sort', ['ruta' => 'autos.index', 'campo' => 'precio', 'etiqueta' => 'Precio'])
                @include('partials.th-sort', ['ruta' => 'autos.index', 'campo' => 'estado', 'etiqueta' => 'Estado'])
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($autos as $auto)
                <tr>
                    <td>{{ $auto->id_auto }}</td>
                    <td>{{ $auto->marca }}</td>
                    <td>{{ $auto->modelo }}</td>
                    <td>${{ $auto->precio }}</td>
                    <td>{{ $auto->estado }}</td>
                    <td class="text-end">
                        <a href="{{ route('autos.edit', $auto) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('autos.destroy', $auto) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este auto?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay autos.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $autos->withQueryString()->links('pagination::bootstrap-5') }}
@endsection
