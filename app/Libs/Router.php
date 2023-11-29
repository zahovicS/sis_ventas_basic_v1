<?php

namespace App\Libs;

use Exception;

class Router
{
    private $controller;
    private $method;

    public function __construct()
    {
        $this->matchRoute();
    }

    public function matchRoute()
    {
        $url = explode('/', URL);

        if(empty($url[1]) || empty($url[2])){
            if(!Session::has("usuario")){
                return redirect("/Auth/index");
            }
            return redirect("/Home/index");
        }

        $this->controller = $url[1];
        $this->method = $url[2];
        if(!Session::has("usuario")){
            if($this->controller != "Auth"){
                return redirect("/Auth/index");
            }
        }
        if(Session::has("usuario")){
            if($this->controller == "Auth" && $this->method != "logout"){
                return redirect("/Home/index");
            }
        }
        
        $this->controller = $this->controller . 'Controller';
        $controllerClass = 'App\\Controllers\\' . $this->controller;
        if (class_exists($controllerClass)) {
            $this->controller = new $controllerClass();
        } else {
            throw new Exception("Controller not Exists", 1);
        }
    }

    public function run()
    {
        $request = Request::capture();
        $controller = $this->controller;
        $method = $this->method;
        $controller->$method($request);
    }
}
