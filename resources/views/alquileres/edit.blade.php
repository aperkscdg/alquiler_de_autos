@extends('layouts/main')

@section('titulo', 'Editar alquiler')

@section('contenido')
    <h1 class="h3 mb-3">Editar alquiler</h1>
    @include('alquileres._form', ['action' => route('alquileres.update', $alquiler)])
@endsection
