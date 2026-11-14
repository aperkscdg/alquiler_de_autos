<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Auto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class AlquilerController extends Controller
{
    // 1. LISTAR con Buscador y Ordenamiento
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortField = $request->input('sort', 'id_alquiler');
        $sortDirection = $request->input('direction', 'asc');

        // Traemos los alquileres con sus relaciones (Auto y Cliente)
        $alquileres = Alquiler::with(['auto', 'cliente'])
            ->when($search, function ($query, $search) {
                // Buscamos por algún campo relacionado, por ejemplo, el DNI del cliente o modelo del auto
                return $query->whereHas('cliente', function ($q) use ($search) {
                    $q->where('nombre', 'like', "%{$search}%")
                      ->orWhere('dni', 'like', "%{$search}%");
                })->orWhereHas('auto', function ($q) use ($search) {
                    $q->where('modelo', 'like', "%{$search}%")
                      ->orWhere('marca', 'like', "%{$search}%");
                });
            })
            ->orderBy($sortField, $sortDirection)
            ->paginate(5);

        return view('alquileres.index', compact('alquileres', 'search', 'sortField', 'sortDirection'));
    }

    // 2. MOSTRAR FORMULARIO DE CREACIÓN
    public function create()
    {
        // Necesitamos mandar los autos y clientes a la vista para llenar los <select>
        $autos = Auto::where('estado', 'activo')->get(); 
        $clientes = Cliente::all();
        
        return view('alquileres.create', compact('autos', 'clientes'));
    }

    // 3. GUARDAR EN LA BASE DE DATOS
    public function store(Request $request)
    {
        $request->validate([
            'id_auto' => 'required|exists:autos,id_auto',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        Alquiler::create($request->all());

        return redirect()->route('alquileres.index')->with('success', 'Alquiler registrado con éxito.');
    }

    // 4. MOSTRAR FORMULARIO DE EDICIÓN
    public function edit($id_alquiler)
    {
        $alquiler = Alquiler::findOrFail($id_alquiler);
        $autos = Auto::all();
        $clientes = Cliente::all();

        return view('alquileres.edit', compact('alquiler', 'autos', 'clientes'));
    }

    // 5. ACTUALIZAR EN LA BASE DE DATOS
    public function update(Request $request, $id_alquiler)
    {
        $request->validate([
            'id_auto' => 'required|exists:autos,id_auto',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $alquiler = Alquiler::findOrFail($id_alquiler);
        $alquiler->update($request->all());

        return redirect()->route('alquileres.index')->with('success', 'Alquiler actualizado correctamente.');
    }

    // 6. ELIMINAR REGISTRO
    public function destroy($id_alquiler)
    {
        $alquiler = alquiler::findOrFail($id_alquiler);
        $alquiler->delete();

        return redirect()->route('alquileres.index')->with('success', 'Alquiler eliminado.');
    }
}
