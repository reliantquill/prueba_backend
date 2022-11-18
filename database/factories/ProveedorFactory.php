<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proveedor>
 */
class ProveedorFactory extends Factory
{
    public function definition()
    {
        return [
            'nit' => fake()->regexify('[1-9]') . fake()->numerify('########'),
            'descripcion' => fake()->company(),
            'estado_id' => 1
        ];
    }
}
