<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pedido;
use App\Models\Venta;
use App\Models\Inventario;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venta>
 */
class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $pedidos    = Pedido::select('id')->get();
        $subsql     = Venta::select('inventario_id');
        $inventario = Inventario::producto_not_in($subsql)->select('id')->get();
        return [
            'pedido_id'     => $pedidos->random(),
            'inventario_id' => $inventario->random(),
        ];
    }
}
