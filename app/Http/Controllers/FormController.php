<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\EstadoController;

class FormController extends Controller
{
    public function productos() {
        $estadoController = new EstadoController();

        $estados  = $estadoController->index();
        return array('estados'=>$estados);
    }
}
