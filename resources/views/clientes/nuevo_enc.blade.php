@extends('layouts/main')

@section('titulo', 'Nuevo cliente')

@section('contenido')
    <h1 class="h3 mb-3 text-danger">Nuevo cliente</h1>
    @include('clientes.formulario', ['action' => route('clientes.store')])
@endsection
