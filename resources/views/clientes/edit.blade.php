@extends('layouts/main')

@section('titulo', 'Editar cliente')

@section('contenido')
    <h1 class="h3 mb-3">Editar cliente</h1>
    @include('clientes._form', ['action' => route('clientes.update', $cliente)])
@endsection
