<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
use App\Models\Proveedor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventario>
 */
class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $productos = Producto::select('id')->get();
        $proveedor = Proveedor::select('id')->get();
        return [
            'producto_id'  => $productos->random(),
            'proveedor_id' => $proveedor->random(),
            'subestado_id' => 2
        ];
    }
}
