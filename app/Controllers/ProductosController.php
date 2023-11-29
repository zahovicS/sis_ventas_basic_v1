<?php

namespace App\Controllers;

use App\Libs\Controller;
use App\Libs\Request;
use App\Libs\Response;
use App\Libs\Validator;
use App\Models\Productos;
use Exception;

class ProductosController extends Controller
{
    protected $productosModel;
    function __construct(){
        $this->productosModel = new Productos;
    }
    public function index()
    {
        return $this->view("Productos.index",[
            "title_page_container" => "Productos"
        ]);
    }
    public function dataTable(){
        $result = [];
        $productos = $this->productosModel->getAll();
        foreach ($productos as $key => $producto) {
            $buttons = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
            if($producto["estado"] == 1){
                $buttons .= "<button type='button' class='btn btn-info btnMovimientoProducto' data-id-producto='{$producto["id"]}' title='Hacer movimientos'><i class='fa-solid fa-arrow-right-arrow-left'></i></button>";
                $buttons .= "<button type='button' class='btn btn-warning btnEditarProducto' data-id-producto='{$producto["id"]}' title='Editar' data-bs-toggle='modal' data-bs-target='#modalAddEditProductos'><i class='fa-duotone fa-pen'></i></button>";
                $buttons .= "<button type='button' class='btn btn-danger btnDesactivarProducto' data-id-producto='{$producto["id"]}' title='Desactivar'><i class='fa-sharp fa-solid fa-ban'></i></button>";
            }
            if($producto["estado"] == 0){
                $buttons .= "<button type='button' class='btn btn-success btnRestaurarProducto' data-id-producto='{$producto["id"]}' title='Restaurar'><i class='fa-sharp fa-solid fa-rotate-left'></i></button>";
            }
            $buttons .= '</div>';
            $result[] = [
                "ID" => $key + 1,
                "codigo" => $producto["codigo"],
                "producto" => $producto["descripcion"],
                "precio" => number_format($producto["precio"],2),
                "stock" => number_format($producto["existencia"],2),
                "estado" => build_badge($producto["estado"]),
                "opciones" => $buttons,
            ];
        }
        return Response::json($result);
    }
    public function guardar_producto(Request $request)
    {
        $validator = Validator::validate($request->all(), [
            "codigo" => "required|string|min:1",
            "descripcion" => "required|string|min:1",
            "precio" => "required|numeric",
            "admin_existencias" => "required|string|min:1|max:1",
            "existencias" => "nullable|numeric",
        ]);
        if ($validator->fails()) {
            return Response::json(["status" => "error", "message" => "Error en los siguientes campos.", "errors" => $validator->errors()]);
        }
        try {
            $this->productosModel->insert([
                "codigo" => $request->getVar("codigo"),
                "descripcion" => $request->getVar("descripcion"),
                "precio" => $request->getVar("precio"),
                "admin_existencias" => $request->getVar("admin_existencias"),
                "existencia" => $request->getVar("existencia"),
            ]);
            return Response::json(["status" => "success", "message" => "Guardado correctamente"]);
        } catch (Exception $exception) {
            return Response::json(["status" => "error", "message" => "Error en al insertar.", "errors" => $exception->getMessage()]);
        }
    }
    public function editar_producto(Request $request)
    {
        $producto = $this->productosModel->query("SELECT * from producto WHERE estado = '1' AND id = :id_producto",[
            "id_producto" => $request->getVar("id_producto")
        ])->first();
        return Response::json($producto);
    }
    public function actualizar_producto(Request $request)
    {
        $validator = Validator::validate($request->all(), [
            "id_producto" => "required|string|min:1",
            "codigo" => "required|string|min:1",
            "descripcion" => "required|string|min:1",
            "precio" => "required|numeric",
            "admin_existencias" => "required|string|min:1|max:1",
            "existencias" => "nullable|numeric",
        ]);
        if ($validator->fails()) {
            return Response::json(["status" => "error", "message" => "Error en los siguientes campos.", "errors" => $validator->errors()]);
        }
        try {
            $this->productosModel->updateById($request->getVar("id_producto"),[
                "codigo" => $request->getVar("codigo"),
                "descripcion" => $request->getVar("descripcion"),
                "precio" => $request->getVar("precio"),
                "admin_existencias" => $request->getVar("admin_existencias"),
                "existencia" => 0,
            ]);
            return Response::json(["status" => "success", "message" => "Actualizado correctamente"]);
        } catch (Exception $exception) {
            return Response::json(["status" => "error", "message" => "Error en al insertar.", "errors" => $exception->getMessage()]);
        }
    }
}
