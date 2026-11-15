@extends('layouts/main')

@section('titulo', 'Nuevo auto')

@section('contenido')
    <h1 class="h3 mb-3 text-danger">Nuevo auto</h1>
    @include('autos.formulario', ['action' => route('autos.store')])
@endsection
