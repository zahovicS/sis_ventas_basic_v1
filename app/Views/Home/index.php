<?= render("Components.WidgetVentas"); ?>
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Productos con stock mínimo
            </div>
            <div class="card-body"><canvas id="lowStockChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Productos más vendidos
            </div>
            <div class="card-body"><canvas id="bestSellerProduct" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>