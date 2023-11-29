<form action="<?= route("/Auth/login") ?>" method="POST" autocomplete="off" id="frmLogin">
    <div class="mb-3">
        <label for="inputUser" class="mb-2"><i class="fa-duotone fa-user"></i> Usuario</label>
        <input class="form-control" name="usuario" id="inputUser" type="text" />
    </div>
    <div class="mb-3">
        <label for="inputPassword" class="mb-2"><i class="fa-duotone fa-key"></i> Contraseña</label>
        <input class="form-control" name="password" id="inputPassword" type="password" />
    </div>
    <div class="d-flex align-items-end justify-content-end">
        <button class="btn btn-primary" id="btnLogin"><i class="fa-duotone fa-right-to-bracket"></i> Iniciar Sesión</button>
    </div>
</form>

<script src="<?= asset("js/Auth/login.js") ?>"></script>