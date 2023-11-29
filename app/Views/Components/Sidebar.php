<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Administración</div>
            <a class="nav-link" href="<?= route("/Home/index") ?>">
                <div class="sb-nav-link-icon"><i class="fa-duotone fa-chart-simple"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="<?= route("/Clientes/index") ?>">
                <div class="sb-nav-link-icon"><i class="fa-duotone fa-user-tie"></i></div>
                Clientes
            </a>
            <a class="nav-link" href="<?= route("/Productos/index") ?>">
                <div class="sb-nav-link-icon"><i class="fa-duotone fa-box-open"></i></div>
                Productos
            </a>
            <!-- <div class="sb-sidenav-menu-heading">Vetas</div> -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fa-duotone fa-cart-shopping"></i></div>
                Ventas
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<?= route("/Ventas/nueva_venta") ?>"><div class="sb-nav-link-icon"><i class="fa-duotone fa-cart-plus"></i></div> Nueva venta</a>
                    <a class="nav-link" href="<?= route("/Ventas/index") ?>"><div class="sb-nav-link-icon"><i class="fa-duotone fa-clipboard-list"></i></div> Ver las ventas</a>
                </nav>
            </div>
            <a class="nav-link" href="<?= route("/Usuarios/index") ?>">
                <div class="sb-nav-link-icon"><i class="fa-duotone fa-user"></i></div>
                Usuarios
            </a>
            <a class="nav-link" href="<?= route("/Configuracion/index") ?>">
                <div class="sb-nav-link-icon"><i class="fa-duotone fa-sliders"></i></div>
                Configuración
            </a>
            <!-- <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Layouts
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                </nav>
            </div> -->
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logeado como:</div>
        <?= session_get("usuario")["nombre"] ?>
    </div>
</nav>