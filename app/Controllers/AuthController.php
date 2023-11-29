<?php

namespace App\Controllers;

use App\Libs\Controller;
use App\Libs\Request;
use App\Libs\Response;
use App\Libs\Session;
use App\Libs\Validator;
use App\Models\Usuario;

class AuthController extends Controller
{
    protected $usuarioModel;
    function __construct(){
        $this->usuarioModel = new Usuario;
    }
    public function index()
    {
        return $this->view("Auth.login",[
            "title_page_container" => "Login"
        ],'auth');
    }
    public function login(Request $request)
    {
        $validator = Validator::validate($request->all(), [
            "usuario" => "required|string",
            "password" => "required|min:1",
        ]);
        if ($validator->fails()) {
            return Response::json(["status" => "error", "message" => "Error en los siguientes campos.", "errors" => $validator->errors()]);
        }
        $data = $this->usuarioModel->query("SELECT * from usuario where usuario = :usuario",["usuario" => $request->getVar("usuario")])->first();
        if(!$data){
            return Response::json(["status" => "error", "message" => "No existe el usuario."]);
        }
        if(!$this->attempt($data,$request->getVar("password"))){
            return Response::json(["status" => "error", "message" => "La contraseña es incorrecta."]);
        }
        if (!password_verify($request->getVar("password"), $data["clave"])) {
            return Response::json(["status" => "error", "message" => "La contraseña es incorrecta."]);
        }
        return Response::json(["status" => "success", "message" => "Inicio de sesion correctamente, redirigiendo..."]);
    }

    public function logout(){
        Session::destroy();
        return redirect("/Auth/index");
    }

    private function attempt($usuario,$password){
        if (!password_verify($password, $usuario["clave"])) {
            return false;
        }
        Session::put("usuario",$usuario);
        return true;
    }
}
