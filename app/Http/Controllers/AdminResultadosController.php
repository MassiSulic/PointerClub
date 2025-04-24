<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resultado;
use Illuminate\Support\Facades\Storage;

class AdminResultadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados = Resultado::paginate(10);
        return view('admin.resultados.index', compact('resultados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.resultados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'texto_destacado' => 'nullable|string',
            'imagen1' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'imagen2' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Procesar imágenes
        if ($request->hasFile('imagen1')) {
            $data['imagen1'] = $request->file('imagen1')->store('resultados', 'public');
        }
        if ($request->hasFile('imagen2')) {
            $data['imagen2'] = $request->file('imagen2')->store('resultados', 'public');
        }

        Resultado::create($data);

        return redirect()->route('admin.resultados.index')->with('success', 'Resultado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resultado $resultado)
    {
        return view('admin.resultados.show', compact('resultado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resultado $resultado)
    {
        return view('admin.resultados.edit', compact('resultado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resultado $resultado)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'texto_destacado' => 'nullable|string',
            'imagen1' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'imagen2' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagen1')) {
            $data['imagen1'] = $request->file('imagen1')->store('resultados', 'public');
        }
        if ($request->hasFile('imagen2')) {
            $data['imagen2'] = $request->file('imagen2')->store('resultados', 'public');
        }

        $resultado->update($data);

        return redirect()->route('admin.resultados.index')->with('success', 'Resultado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultado $resultado)
    {
        if ($resultado->imagen1) {
            Storage::disk('public')->delete($resultado->imagen1);
        }
        if ($resultado->imagen2) {
            Storage::disk('public')->delete($resultado->imagen2);
        }

        $resultado->delete();

        return redirect()->route('admin.resultados.index')->with('success', 'Resultado eliminado correctamente.');
    }
}
