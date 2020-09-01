<link rel="stylesheet" href="<?=BASE_URL;?>/assets/css/dashboard.css" />

<h1>DASHBOARD</h1>

<div class="dash">
    <div class="dash-item">
        <p>Produtos Vendidos</p>
        <p><?= $product_sold; ?></p>
    </div>
    <div class="dash-item">
        <p>Receitas</p>
        <p>R$ <?= number_format($revenue, 2, ',', '.'); ?></p>
    </div>
    <div class="dash-item">
        <p>Despesas</p>
        <p>R$ <?= number_format($expenses, 2, ',', '.'); ?></p>
    </div>
</div>

<div class="grid-2">
    <div class="dash-graf-1">
        <canvas id="graf1"></canvas>
    </div>

    <div class="dash-graf-2">
        <canvas id="graf2" height="300"></canvas>
    </div>
</div>
<script>
    var list_days = <?php  echo json_encode($days_list); ?>;
    var revenue_list = <?php  echo json_encode(array_values($revenue_list)); ?>;
    var expenses_list = <?php  echo json_encode(array_values($expenses_list)); ?>;
    var status_name_list = <?php  echo json_encode(array_values($statuses)); ?>;
    var status_list = <?php  echo json_encode(array_values($status_list)); ?>;
</script>
<script src="<?= BASE_URL; ?>/assets/js/Chart.min.js"></script>
<script src="<?= BASE_URL; ?>/assets/js/script_home.js"></script>


