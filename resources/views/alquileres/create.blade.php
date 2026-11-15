@extends('layouts/main')

@section('titulo', 'Nuevo alquiler')

@section('contenido')
    <h1 class="h3 mb-3">Nuevo alquiler</h1>
    @include('alquileres._form', ['action' => route('alquileres.store')])
@endsection
