<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
            'nombre' => 'Laptop Gamer',
            'precio' => 1200.50,
            'descripcion' => 'Laptop potente para gaming y trabajo.',
            'cantidad' => 5
        ]);

        Producto::create([
            'nombre' => 'Smartphone Pro',
            'precio' => 850.99,
            'descripcion' => 'Teléfono inteligente de última generación.',
            'cantidad' => 10
        ]);

        Producto::create([
            'nombre' => 'Monitor 4K',
            'precio' => 400.75,
            'descripcion' => 'Monitor UHD con excelente calidad de imagen.',
            'cantidad' => 8
        ]);

        Producto::create([
            'nombre' => 'Teclado Mecánico RGB',
            'precio' => 99.99,
            'descripcion' => 'Teclado mecánico con retroiluminación RGB personalizable.',
            'cantidad' => 15
        ]);

        Producto::create([
            'nombre' => 'Mouse Inalámbrico',
            'precio' => 49.50,
            'descripcion' => 'Mouse ergonómico con batería de larga duración.',
            'cantidad' => 20
        ]);
    }
}
