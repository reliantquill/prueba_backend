<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $estado = new Estado();
        $estado->descripcion = "HABILITADO";
        $estado->color = "green";
        $estado->save();

        $estado = new Estado();
        $estado->descripcion = "DESACTIVADO";
        $estado->color = "red";
        $estado->save();
    }
}
