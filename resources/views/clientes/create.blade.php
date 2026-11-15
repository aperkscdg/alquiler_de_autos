@extends('layouts/main')

@section('titulo', 'Nuevo cliente')

@section('contenido')
    <h1 class="h3 mb-3">Nuevo cliente</h1>
    @include('clientes._form', ['action' => route('clientes.store')])
@endsection
