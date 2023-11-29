<?php

namespace App\Controllers;

use App\Libs\Controller;
use App\Models\Productos;

class HomeController extends Controller
{
    public function index()
    {
        return $this->view("Home.index",[
            "title_page_container" => "Dashboard"
        ]);
    }
    public function listar()
    {
        $modelProductos = new Productos();
        $data = $modelProductos->getAll();
        dd($data);
    }
}
