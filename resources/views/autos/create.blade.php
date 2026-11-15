@extends('layouts/main')

@section('titulo', 'Nuevo auto')

@section('contenido')
    <h1 class="h3 mb-3">Nuevo auto</h1>
    @include('autos._form', ['action' => route('autos.store')])
@endsection
