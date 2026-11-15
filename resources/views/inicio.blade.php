@extends('layouts/main')

@section('titulo', 'Inicio')

@section('contenido')
    <div class="text-center py-4">
        <h1 class="display-6">Agencia de alquiler de autos</h1>
        <p class="lead text-muted">Gestiona la flota, los clientes y los alquileres desde un solo lugar.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h2 class="h5 card-title">Alquileres</h2>
                    <p class="card-text text-muted">Registra qué cliente alquila qué auto y en qué fechas.</p>
                    <div class="mt-auto d-flex gap-2">
                        <a href="{{ route('alquileres.index') }}" class="btn btn-primary">Ver alquileres</a>
                        <a href="{{ route('alquileres.create') }}" class="btn btn-outline-primary">Nuevo</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h2 class="h5 card-title">Autos</h2>
                    <p class="card-text text-muted">Administra la flota: marca, modelo, precio y estado.</p>
                    <div class="mt-auto d-flex gap-2">
                        <a href="{{ route('autos.index') }}" class="btn btn-primary">Ver autos</a>
                        <a href="{{ route('autos.create') }}" class="btn btn-outline-primary">Nuevo</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h2 class="h5 card-title">Clientes</h2>
                    <p class="card-text text-muted">Datos de contacto y documentación de cada cliente.</p>
                    <div class="mt-auto d-flex gap-2">
                        <a href="{{ route('clientes.index') }}" class="btn btn-primary">Ver clientes</a>
                        <a href="{{ route('clientes.create') }}" class="btn btn-outline-primary">Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
