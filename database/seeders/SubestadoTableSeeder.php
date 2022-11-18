<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subestado;

class SubestadoTableSeeder extends Seeder
{
    public function run() {
        $subestado = new Subestado();
        $subestado->descripcion = "VENDIDO";
        $subestado->save();

        $subestado = new Subestado();
        $subestado->descripcion = "EN INVENTARIO";
        $subestado->save();
    }
}
