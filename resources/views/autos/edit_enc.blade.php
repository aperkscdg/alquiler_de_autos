@extends('layouts/main')

@section('titulo', 'Editar auto')

@section('contenido')
    <h1 class="h3 mb-3">Editar auto</h1>
    @include('autos.formulario', ['action' => route('autos.update', $auto)])
@endsection
