'use strict';

let tblProductos = null;
const $tblProductos = document.querySelector('#tblProductos');
const $modalAddEditProductos = document.querySelector('#modalAddEditProductos');
const $modalTitleAddEditProductos = document.querySelector('#modalTitleAddEditProductos');
const $modalAddEditSubmitProductos = document.querySelector('#modalAddEditSubmitProductos');
const $formAddEditProductos = document.querySelector('#formAddEditProductos');
const $frmToggleExistenciasInput = document.querySelector('#manejarExistenciasProducto');
const $frmCodigoInput = document.querySelector('#codigoProducto');
const $frmDescripcionInput = document.querySelector('#descripcionProducto');
const $frmPrecioInput = document.querySelector('#precioProducto');
const $frmExistenciasInput = document.querySelector('#ExistenciasProducto');
const $frmIDProductoInput = document.querySelector('#idProducto');

const buildTblProductos = async () => {
    const productos = await axios({
        method: 'POST',
        url: route('/Productos/dataTable'),
    });
    if(tblProductos) tblProductos.destroy();
    tblProductos = new simpleDatatables.DataTable($tblProductos, {
        locale: 'es',
        data: {
            data: productos.data.map(item => Object.values(item))
        },
        // destroyable: true,
        labels: simple_table_ES,
        columns: [
            {
                select: 0,
                cellClass: 'text-center w-5',
                sortable: false
            },
            {
                select: 1,
                cellClass: 'w-10',
            },
            {
                select: 3,
                cellClass: 'text-center w-10',
            },
            {
                select: 4,
                cellClass: 'text-center w-10',
            },
            {
                select: 5,
                cellClass: 'text-center w-10',
                sortable: false
            },
            {
                select: 6,
                cellClass: 'text-center w-10',
                sortable: false
            }
        ],
    });
}

const editarProducto = async (id_producto) => {
    const loader = Loader("Obteniendo datos...");
    const response = await axios({
        method: 'POST',
        url: route('/Productos/editar_producto'),
        data: {
            id_producto
        }
    }).finally(function () {
        setTimeout(() => {
            loader.close();
        }, 1000);
    });
    const producto = response.data;
    if(producto.length == 0){
        AlertError({
            errors: "No hay producto a editar, error en la consulta."
        });
        return;
    }
    toggleModalProductos("update");
    $frmIDProductoInput.value = producto.id;
    $frmCodigoInput.value = producto.codigo;
    $frmDescripcionInput.value = producto.descripcion;
    $frmPrecioInput.value = producto.precio;
    // const event = new Event('change');
    if(producto.admin_existencias == '1'){
        $frmToggleExistenciasInput.checked = true;
        // $frmToggleExistenciasInput.dispatchEvent(event);
        // $frmExistenciasInput.value = producto.existencia;
    }
    if(producto.admin_existencias == '0'){
        $frmToggleExistenciasInput.checked = false;
        // $frmToggleExistenciasInput.dispatchEvent(event);
    }
}

const toggleModalProductos = (mode = "save") => {
    // resetar el formulario
    $frmIDProductoInput.value = "";
    $frmExistenciasInput.setAttribute("disabled", true);
    $formAddEditProductos.reset();
    if (mode == "save") {
        // resetar el modal
        $modalTitleAddEditProductos.innerText = "Crear Producto"
        $modalAddEditSubmitProductos.innerHTML = `<i class="fa-solid fa-floppy-disk"></i> Guardar producto`;
        $formAddEditProductos.setAttribute("action", route("/Productos/guardar_producto"));
    }
    if (mode == "update") {
        // resetar el modal
        $modalTitleAddEditProductos.innerText = "Actualizar Producto"
        $modalAddEditSubmitProductos.innerHTML = `<i class="fa-solid fa-pen"></i> Actualizar producto`;
        $formAddEditProductos.setAttribute("action", route("/Productos/actualizar_producto"));
    }
}

const init = async () => {
    await buildTblProductos();
}

document.addEventListener('DOMContentLoaded', async function () {
    await init();
    document.body.addEventListener('click', async function (evt) {
        //editar
        const $btnEditarProducto = evt.target.closest('.btnEditarProducto');
        const $btnDesactivarProducto = evt.target.closest('.btnDesactivarProducto');
        const $btnRestaurarProducto = evt.target.closest('.btnRestaurarProducto');
        const $btnMovimientoProducto = evt.target.closest('.btnMovimientoProducto');

        if ($btnEditarProducto) {
            const id_producto = $btnEditarProducto.dataset.idProducto;
            await editarProducto(id_producto);
        }

    }, false);

    $formAddEditProductos.addEventListener('submit', async function (e) {
        e.preventDefault();
        $modalAddEditSubmitProductos.setAttribute('disabled', true);
        const url = this.getAttribute("action");
        const response = await axios({
            method: 'POST',
            url: url,
            data: {
                id_producto: $frmIDProductoInput.value,
                codigo: $frmCodigoInput.value,
                descripcion: $frmDescripcionInput.value,
                precio: $frmPrecioInput.value,
                admin_existencias: $frmToggleExistenciasInput.checked ? "1" : "0",
                existencia: $frmToggleExistenciasInput.checked ? $frmExistenciasInput.value : "0",
            }
        }).finally(function () {
            $modalAddEditSubmitProductos.removeAttribute('disabled');
        });
        DinamicAlert(response.data);
        if (response.data.status == 'success') {
            await buildTblProductos();
            modal($modalAddEditProductos).hide();
            return;
        }
    });
    $frmToggleExistenciasInput.addEventListener("change", function () {
        const statusCheck = this.checked;
        const isUpdate = $frmIDProductoInput.value != "";
        $frmExistenciasInput.setAttribute("disabled", true);
        $frmExistenciasInput.value = "";
        if (statusCheck && !isUpdate) {
            $frmExistenciasInput.removeAttribute("disabled");
            $frmExistenciasInput.focus();
            $frmExistenciasInput.value = 0;
        }
    })
    $modalAddEditProductos.addEventListener('hidden.bs.modal', function () {
        toggleModalProductos();
    })
}, false);