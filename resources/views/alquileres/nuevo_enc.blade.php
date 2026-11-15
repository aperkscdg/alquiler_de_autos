@extends('layouts/main')

@section('titulo', 'Nuevo alquiler')

@section('contenido')
    <h1 class="h3 mb-3 text-danger">Nuevo alquiler</h1>
    @include('alquileres.formulario', ['action' => route('alquileres.store')])
@endsection
