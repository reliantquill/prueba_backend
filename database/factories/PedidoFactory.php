<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //1. Cliente::factory();
        $clientes = Cliente::select('id')->get();
        return [
            'cliente_id' => $clientes->random(),
            'fecha' => '2022' . substr(fake()->date(), 4)
        ];
    }
}
