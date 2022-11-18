<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    public function definition()
    {
        return [
            'identificacion' =>  fake()->regexify('[1-9]') . fake()->numerify('########'),
            'descripcion' => fake()->name(),
            'estado_id' => 1
        ];
    }
}
