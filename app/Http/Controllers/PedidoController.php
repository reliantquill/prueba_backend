<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    private $relacion = array('cliente', 'ventas', 'ventas.inventario.producto');

    public function index() {
        return Pedido::with($this->relacion)->get();
    }

    public function por_fechas($fecha) {
        return Pedido::with($this->relacion)->fechas($fecha)->get();
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
