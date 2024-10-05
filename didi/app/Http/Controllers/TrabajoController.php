<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    // Mostrar todos los trabajos
    public function index()
    {
        $trabajos = Trabajo::all();
        return view('trabajos.index', compact('trabajos'));
    }

    // Mostrar el formulario para crear un nuevo trabajo
    public function create()
    {
        return view('trabajos.create');
    }

    // Guardar un nuevo trabajo
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'salario' => 'required|numeric',
            'ubicacion' => 'required',
        ]);

        Trabajo::create($request->all());

        return redirect()->route('trabajos.index')->with('success', 'Trabajo creado exitosamente.');
    }

    // Mostrar los detalles de un trabajo
    public function show(Trabajo $trabajo)
    {
        return view('trabajos.show', compact('trabajo'));
    }

    // Mostrar el formulario para editar un trabajo
    public function edit(Trabajo $trabajo)
    {
        return view('trabajos.edit', compact('trabajo'));
    }

    // Actualizar un trabajo existente
    public function update(Request $request, Trabajo $trabajo)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'salario' => 'required|numeric',
            'ubicacion' => 'required',
        ]);

        $trabajo->update($request->all());

        return redirect()->route('trabajos.index')->with('success', 'Trabajo actualizado exitosamente.');
    }

    // Eliminar un trabajo
    public function destroy(Trabajo $trabajo)
    {
        $trabajo->delete();

        return redirect()->route('trabajos.index')->with('success', 'Trabajo eliminado exitosamente.');
    }
}
