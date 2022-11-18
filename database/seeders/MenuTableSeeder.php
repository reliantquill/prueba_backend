<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $menu = new Menu();
        $menu->menu      = 'PRODUCTOS';
        $menu->icono     = 'mdi-xmpp';
        $menu->ruta      = 'productos';
        $menu->estado_id = 1;
        $menu->save();

        $menu = new Menu();
        $menu->menu      = 'PEDIDOS';
        $menu->icono     = 'mdi-cards-outline';
        $menu->ruta      = 'pedidos';
        $menu->estado_id = 1;
        $menu->save();
    }
}
