<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\MenuController;

class UserController extends Controller
{
    private $relacion = array('estado');

    public function index() {
        return User::with($this->relacion)->get();
    }

    public function por_email($email) {
        return User::with($this->relacion)->email($email)->estado_id(1)->first();
    }

    public function por_id($id) {
        return User::with($this->relacion)->id($id)->first();
    }

    public function por_identificacion($identificacion) {
        return User::with($this->relacion)->identificacion($identificacion)->first();
    }

    public function logeo(UserRequest $request) {
        $menuController = new MenuController();

        $data  = array('user'=> null, 'token'=> '');
        $security   = '';
        $login = $request->login;
        $user  = $this->por_email($login['email']);
        if($user!=null) {
            if(Hash::check($login['password'], $user['password'])) {
                $this->eliminar_token($user);
                $token = $this->generar_token($user);
                $menus =  $menuController->index();
                $data  = array('user'=>$user, 'token'=>$token, 'menus'=>$menus);
            }
        }

        return array('data'=>$data, 'security'=> $security);
    }



    public function generar_token($user) {
        $token = $user->createToken('auth_token');
        //$token->id
        //$token->plainTextToken
        return $token;
    }

    public function eliminar_token( $user) {
        // TOKEN ESPECIFICADO - user()->tokens()->where('id', $id)->delete()
        // ELIMINA TODO LOS TOKEN DEL USUARIO
        $user->tokens()->delete();
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
