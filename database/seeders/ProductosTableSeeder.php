<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosTableSeeder extends Seeder
{
    public function run()
    {
        Producto::create([
            'nombre' => 'Café Espresso',
            'referencia' => 'ESP001',
            'precio' => 2500,
            'peso' => 250,
            'categoria' => 'Bebida',
            'stock' => 100,
            'fecha_creacion' => now(),
        ]);
    }
}
