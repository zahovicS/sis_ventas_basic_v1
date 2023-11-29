<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="base_url" content="<?= route() ?>">
    <title><?= $title_page_container ?? "Titulo" ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= asset("css/styles.css") ?>">
    <link href="<?= asset("css/all.css") ?>" rel="stylesheet">
    <link href="<?= asset("css/sharp-light.css") ?>" rel="stylesheet">
    <link href="<?= asset("css/sharp-regular.css") ?>" rel="stylesheet">
    <link href="<?= asset("css/sharp-solid.css") ?>" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?= asset("js/Helpers/functions.js") ?>"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container h-100">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-2">Inicio de sesión</h3>
                                </div>
                                <div class="card-body">
                                    <?= $content_html ?? "-" ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>