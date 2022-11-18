<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Inventario;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Venta;

class FactoryTableSeeder extends Seeder
{
    public function run() {
        Cliente::factory(50)->create();
        Proveedor::factory(50)->create();
        Producto::factory(50)->create();
        Inventario::factory(500)->create();
        Pedido::factory(50)->create();
        Venta::factory(50)->create();
    }
}
