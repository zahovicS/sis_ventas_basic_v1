<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa-duotone fa-hammer me-1"></i>
                    Herramientas:
                </div>
                <div>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAddEditProductos" title="Añadir productos"><i class="fa-solid fa-plus"></i></button>
                    <button class="btn btn-success btn-sm" title="Reporte de productos"><i class="fa-duotone fa-file-excel"></i></button>
                </div>
            </div>
            <div class="card-body">
                <table id="tblProductos">
                    <thead>
                        <tr>
                            <th><span class="w-100 text-center">#</span></th>
                            <th>Código</th>
                            <th>Producto</th>
                            <th><span class="w-100 text-center">Precio</span></th>
                            <th><span class="w-100 text-center">Stock</span></th>
                            <th><span class="w-100 text-center">Estado</span></th>
                            <th><span class="w-100 text-center">Opciones</span></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<?= render("Productos.modals.ModalAddedit") ?>
<script src="<?= asset("js/Productos/productos.js") ?>"></script>