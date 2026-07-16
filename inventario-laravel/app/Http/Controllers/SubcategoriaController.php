<?php

namespace App\Http\Controllers;

use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategorias = Subcategoria::all();
        return view('subcategorias.index', compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('subcategorias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:subcategorias',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Subcategoria::create([
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()->route('subcategorias.index')->with('success', 'Subcategoria creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        return view('subcategorias.show', compact('subcategoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        $categorias = Categoria::all();
        return view('subcategorias.edit', compact('subcategoria', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        $request->validate([
            'nombre'=>'required|string|max:225',
            'categoria_id'=> 'required|exists:categorias,id'
        ]);
        $subcategoria->update($request->all());

        return redirect()->route('subcategorias.index')->with('success', 'Subcategoria actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategoria $subcategoria)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        $subcategoria->delete();
        return redirect()->route('subcategorias.index')->with('success','Subcategoria eliminada exitosamente');
    }
}
