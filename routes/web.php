<?php

use App\Http\Controllers\AlquilerController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/alquileres');

Route::resource('autos', AutoController::class)->except('show');
Route::resource('clientes', ClienteController::class)->except('show');
Route::resource('alquileres', AlquilerController::class)->except('show')->parameters(['alquileres' => 'alquiler']);
