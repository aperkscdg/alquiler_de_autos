@extends('layouts/main')

@section('titulo', 'Clientes')

@section('contenido')
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3">Clientes</h1>
        <div>
            <a href="{{ route('alquileres.index') }}" class="btn btn-outline-secondary">Volver</a>
            <a href="{{ route('clientes.create') }}" class="btn btn-success">Nuevo cliente</a>
        </div>
    </div>

    @include('partials.buscador', ['ruta' => 'clientes.index'])

    <table class="table table-striped bg-white">
        <thead>
            <tr>
                @include('partials.th-sort', ['ruta' => 'clientes.index', 'campo' => 'id_cliente', 'etiqueta' => 'ID'])
                @include('partials.th-sort', ['ruta' => 'clientes.index', 'campo' => 'apellido', 'etiqueta' => 'Apellido'])
                @include('partials.th-sort', ['ruta' => 'clientes.index', 'campo' => 'nombre', 'etiqueta' => 'Nombre'])
                @include('partials.th-sort', ['ruta' => 'clientes.index', 'campo' => 'dni', 'etiqueta' => 'DNI'])
                @include('partials.th-sort', ['ruta' => 'clientes.index', 'campo' => 'email', 'etiqueta' => 'Email'])
                @include('partials.th-sort', ['ruta' => 'clientes.index', 'campo' => 'telefono', 'etiqueta' => 'Teléfono'])
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id_cliente }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->dni }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td class="text-end">
                        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este cliente?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay clientes.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $clientes->withQueryString()->links('pagination::bootstrap-5') }}
@endsection
