<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="base_url" content="<?= route() ?>">
    <title><?= $title_page_container ?? "Titulo" ?></title>
    <!-- CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@8.0.1/dist/style.min.css"> -->
    <link href="<?= asset("css/datatable.css") ?>" rel="stylesheet">
    <link href="<?= asset("css/styles.css") ?>" rel="stylesheet">
    <link href="<?= asset("css/all.css") ?>" rel="stylesheet">
    <link href="<?= asset("css/sharp-light.css") ?>" rel="stylesheet">
    <link href="<?= asset("css/sharp-regular.css") ?>" rel="stylesheet">
    <link href="<?= asset("css/sharp-solid.css") ?>" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@8.0.1/dist/umd/simple-datatables.min.js"></script>
    <script src="<?= asset("js/Helpers/functions.js") ?>"></script>
    <script src="<?= asset("js/scripts.js") ?>"></script>
</head>

<body>
    <?= render("Components.Navbar"); ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?= render("Components.Sidebar"); ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"><?= $title_page_container ?? "-" ?></h1>
                    <?= $content_html ?? "-" ?>
                </div>
            </main>
            <?= render("Components.Footer"); ?>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl,{
                boundary: document.body
            }))
        }, false);
    </script>
</body>

</html>