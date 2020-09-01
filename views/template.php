<html>
    <head>
        <meta charset="UTF-8">
        <title>Painel - <?php echo $viewData['company_name']; ?></title>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/template.css" />
        <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/icons.css" />
    </head>
    <body>
        <div class="leftmenu">
            <div class="company_name">
                <h3><?= $viewData['company_name']; ?></h3>
            </div>
            <div class="menuarea">
                <ul>
                    <li><a href="<?= BASE_URL; ?>"><span class="icon-home"> Home</span></a></li>
                    <li><a href="<?= BASE_URL; ?>/permissions"><span class="icon-lock"> Permissões</span></a></li>
                    <li><a href="<?= BASE_URL; ?>/users"><span class="icon-users icon-notext"> Usuários</span></a></li>
                    <li><a href="<?= BASE_URL; ?>/clients"><span class="icon-user"> Clientes</span></a></li>
                    <li><a href="<?= BASE_URL; ?>/inventory"><span class="icon-stock"> Estoque</span></a></li>
                    <li><a href="<?= BASE_URL; ?>/sales"><span class="icon-usd"> Vendas</span></a></li>
                    <li><a href="<?= BASE_URL; ?>/purchases"><span class="icon-cart"> Compras</span></a></li>
                    <li><a href="<?= BASE_URL; ?>/report"><span class="icon-report"> Relatórios</span></a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="top">
                <div class="top_right icon-notext"><a href="<?= BASE_URL; ?>/login/logout"><span class="icon-logout"> Sair</span></a></div>
                <div class="top_right icon-notext"><?= $viewData['user_email']; ?></div>
            </div>
            <div class="area">
                <?php $this->loadViewInTemplate($viewName, $viewData); ?>
            </div>
        </div>

        <script type="text/javascript">
            var BASE_URL = "<?php echo BASE_URL; ?>";
        </script>
        
        <script src="<?= BASE_URL; ?>/assets/js/jquery-3.3.1.min.js"></script>
        <script src="<?= BASE_URL; ?>/assets/js/jquery.mask.js"></script>
        <script src="<?= BASE_URL; ?>/assets/js/script_inventory_add.js"></script>
              
        <script src="<?= BASE_URL; ?>/assets/js/script.js"></script>
        <script src="<?= BASE_URL; ?>/assets/js/script_clients_add.js"></script>
        <script src="<?= BASE_URL; ?>/assets/js/script_sales_add.js"></script>
        <script src="<?= BASE_URL; ?>/assets/js/script_purchases_add.js"></script>
        <script src="<?=BASE_URL;?>/assets/js/report_sales.js"></script>
        
    </body>
</html>
