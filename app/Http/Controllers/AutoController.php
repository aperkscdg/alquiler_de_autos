<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    // Listar con buscador y ordenamiento
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortField = $request->input('sort', 'id_auto');
        $sortDirection = $request->input('direction', 'asc');

        $autos = Auto::when($search, function ($query, $search) {
                return $query->where('modelo', 'like', "%{$search}%")
                             ->orWhere('marca', 'like', "%{$search}%");
            })
            ->orderBy($sortField, $sortDirection)
            ->paginate(5);

        return view('autos.index', compact('autos', 'search', 'sortField', 'sortDirection'));
    }

    public function create()
    {
        return view('autos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'precio' => 'required|integer',
            'estado' => 'required|in:activo,roto,alquilado',
        ]);

        Auto::create($request->all());

        return redirect()->route('autos.index')->with('success', 'Auto registrado con éxito.');
    }

    public function edit(Auto $auto)
    {
        // Usamos route model binding con la clave primaria personalizada
        return view('autos.edit', compact('auto'));
    }

    public function update(Request $request, Auto $auto)
    {
        $request->validate([
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'precio' => 'required|integer',
            'estado' => 'required|in:activo,roto,alquilado',
        ]);

        $auto->update($request->all());

        return redirect()->route('autos.index')->with('success', 'Auto actualizado correctamente.');
    }

    public function destroy(Auto $auto)
    {
        $auto->delete();

        return redirect()->route('autos.index')->with('success', 'Auto eliminado.');
    }
}
