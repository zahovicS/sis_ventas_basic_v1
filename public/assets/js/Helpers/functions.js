"use strict";

const base_url = document.querySelector('meta[name="base_url"]').content

const simple_table_ES = {
    placeholder: "Buscar...", // The search input placeholder
    searchTitle: "Buscar dentro de la tabla", // The search input title
    perPage: "Datos por página", // per-page dropdown label
    pageTitle: "Pág. {page}", // page label used in Aria-label
    noRows: "Datos no encontrados", // Message shown when there are no records to show
    noResults: "Ningún resultado coincide con su consulta de búsqueda", // Message shown when there are no search results
    info: "Mostrando del {start} al {end} de {rows} entradas" //
};

const route = (route = "") => `${base_url}${route}`;

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
});

const TransformArrToText = (messages = null) => {
    let html = ``;
    if (typeof messages === 'string') {
        console.log('====================================');
        console.log("String");
        console.log('====================================');
        html = messages;
    }
    if(typeof messages === 'object'){
        for (const message in messages) {
            if (Object.hasOwnProperty.call(messages, key)) {
                const element = message[key];
                console.log(element);
            }
        }
    }
    if (Array.isArray(messages)) {
        for (const key in messages) {
            const message = messages[key];
            html += `<h6 class="text-uppercase text-white">${key}:</h6>`;
            html += `<ul>`;
            for (const errors of message) {
                html += `<li>${errors}</li>`
            }
            html += `</ul>`;
        }
    }
    return html;
}

const Loader = (text = "Cargando...") => {
    return Swal.fire({
        icon: "info",
        title: text,
        allowOutsideClick: false,
        customClass: {
            // container: '...',
            // popup: '...',
            title: 'text-center',
            // closeButton: '...',
            // icon: '',
            // image: '...',
            // htmlContainer: '...',
            // input: '...',
            // inputLabel: '...',
            // validationMessage: '...',
            // actions: '...',
            // confirmButton: '...',
            // denyButton: '...',
            // cancelButton: '...',
            // loader: '...',
            // footer: '...',
            // timerProgressBar: '...'
        },
        didOpen: () => {
            Swal.showLoading()
        },
    });
}

const AlertError = (errors = {}) => {
    const html = TransformArrToText(errors?.errors || [])
    return Swal.fire({
        icon: "error",
        title: errors?.message || "Error(es):",
        html: html,
        timer: 3000,
        timerProgressBar: true,
        confirmButtonText: "Cerrar",
        customClass: {
            title: 'text-center',
        },
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
}

const AlertSuccess = (success = {}) => {
    return Swal.fire({
        icon: "success",
        title: success?.message || "Error(es):",
        timer: 2000,
        timerProgressBar: true,
        confirmButtonText: "Cerrar",
        customClass: {
            title: 'text-center',
        },
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
}

const DinamicAlert = (data = {}) => {
    const isSuccess = data?.status == "success";
    if(isSuccess){
        AlertSuccess(data);
    }else{
        AlertError(data);
    }
    return;
}

const modal = ($element) => {
    return bootstrap.Modal.getOrCreateInstance($element); 
}