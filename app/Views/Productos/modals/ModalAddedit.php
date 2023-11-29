<!-- Modal -->
<div class="modal fade" id="modalAddEditProductos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form action="<?= route("/Productos/guardar_producto") ?>" method="POST" class="modal-content" id="formAddEditProductos">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitleAddEditProductos">Crear Producto</h1>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="codigoProducto" class="form-label"><i class="fa-solid fa-barcode-read"></i> Código <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="codigoProducto" id="codigoProducto" placeholder="Ingrese la código" required>
                                <input type="hidden" class="form-control" name="idProducto" id="idProducto" value="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="descripcionProducto" class="form-label"><i class="fa-solid fa-box-open"></i> Descripción <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="descripcionProducto" id="descripcionProducto" placeholder="Ingrese la descripción" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="precioProducto" class="form-label"><i class="fa-solid fa-coins"></i> Precio <span class="text-danger">*</span></label>
                                <input type="number" step="any" class="form-control" name="precioProducto" id="precioProducto" placeholder="Ingrese el precio" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="ExistenciasProducto" class="form-label"><i class="fa-sharp fa-solid fa-boxes-stacked"></i> Existencias Físicas</label>
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0 me-1" name="manejarExistenciasProducto" id="manejarExistenciasProducto" type="checkbox" value="on"> <label for="manejarExistenciasProducto">Contabilizar?</label>
                                </div>
                                <input type="number" step="any" min="0" class="form-control" name="ExistenciasProducto" id="ExistenciasProducto" placeholder="Ingrese las existencias" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="modalAddEditSubmitProductos"><i class="fa-solid fa-floppy-disk"></i> Guardar producto</button>
            </div>
        </form>
    </div>
</div>