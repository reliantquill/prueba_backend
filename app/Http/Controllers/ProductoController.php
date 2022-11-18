<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    private $relacion = array('estado');

    public function index() {
        return Producto::with($this->relacion)->orderBy('descripcion', 'asc')->get();
    }

    public function por_id($id) {
        return Producto::with($this->relacion)->id($id)->first();
    }

    public function create() {
        //
    }

    public function store(ProductoRequest $request) {
        $form = $request->form;
        DB::beginTransaction();
        try {
            $rs          = $this->nuevo($form);
            $id          = $rs['id'];
            $registro    = $this->por_id($id);
            $registros   = $this->index();
            $status      = 1;
            DB::commit();
        } catch (\Exception $e) {
            $registros   = [];
            $registro    =  $e->getMessage();
            $status      = 0;
            DB::rollback();
        }
        return array('data'=> array('registro'=>$registro, 'registros'=>$registros) , 'status'=>$status);
    }

    private function nuevo($form) {
        return Producto::create($form);
    }

    private function editar($form, $id) {
        Producto::id($id)->update($form);
        return $this->por_id($id);
    }

    private function anular($id) {
        Producto::id($id)->update(['estado_id'=>2]);
        return $this->por_id($id);
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(ProductoRequest $request, $id) {
        $form = $request->form;
        DB::beginTransaction();
        try {
            $this->editar($form, $id);
            $registro    = $this->por_id($id);
            $registros   = $this->index();
            $status      = 1;
            DB::commit();
        } catch (\Exception $e) {
            $registros   = [];
            $registro    = $e;
            $status      = 0;
            DB::rollback();
        }
        return array('data'=> array('registro'=>$registro, 'registros'=>$registros) , 'status'=>$status);
    }

    public function destroy($id) {
        DB::beginTransaction();
        try {
            $registro    = $this->anular($id);
            $registros   = $this->index();
            $status      = 1;
            DB::commit();
        } catch (\Exception $e) {
            $registros   = [];
            $registro    = $e;
            $status      = 0;
            DB::rollback();
        }
        return array('data'=> array('registro'=>$registro, 'registros'=>$registros) , 'status'=>$status);
    }
}
