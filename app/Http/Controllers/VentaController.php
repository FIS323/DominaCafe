<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function realizarVenta(Request $request)
    {
       
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $productoId = $request->input('producto_id');
        $cantidad = $request->input('cantidad');

        $producto = Producto::find($productoId);

        if ($producto->stock >= $cantidad) {

            $producto->stock -= $cantidad;
            $producto->save();

            Venta::create([
                'producto_id' => $productoId,
                'cantidad' => $cantidad,
            ]);

            return response()->json(['message' => 'Venta realizada con éxito']);
        } else {
            return response()->json(['error' => 'No hay suficiente stock para la venta'], 400);
        }
    }

}
