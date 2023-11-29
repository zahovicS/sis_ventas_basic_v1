"use strict";

const $frmLogin = document.querySelector("#frmLogin");
const $frmInputUsuario = document.querySelector("#inputUser");
const $frmInputPassword = document.querySelector("#inputPassword");
const $frmBtnLogin = document.querySelector("#btnLogin");

document.addEventListener('DOMContentLoaded', function () {
    $frmLogin.addEventListener("submit", async function (e) {
        e.preventDefault();
        $frmBtnLogin.setAttribute("disabled", true);
        const response = await axios({
            method: 'POST',
            url: route("/Auth/login"),
            data: {
                usuario: $frmInputUsuario.value,
                password: $frmInputPassword.value
            }
        }).finally(function () {
            $frmBtnLogin.removeAttribute("disabled");
        });
        DinamicAlert(response.data);
        if (response.data.status == "success") {
            setTimeout(() => {
                location.reload();
            }, 1500);
            return;
        }
    });
}, false);