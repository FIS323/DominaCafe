<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'referencia' => 'required',
            'precio' => 'required|integer',
            'peso' => 'required|integer',
            'categoria' => 'required',
            'stock' => 'required|integer',
            'fecha_creacion' => 'required|date',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'referencia' => 'required',
            'precio' => 'required|integer',
            'peso' => 'required|integer',
            'categoria' => 'required',
            'stock' => 'required|integer',
            'fecha_creacion' => 'required|date',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }
}
