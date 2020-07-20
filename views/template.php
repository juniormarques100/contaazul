<html>
    <head>
        <meta charset="UTF-8">
        <title>Painel - <?php echo $viewData['company_name']; ?></title>
        <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/template.css" />
        <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/icons.css" />
    </head>
    <body>
        <div class="leftmenu">
            <div class="company_name">
                <?php echo $viewData['company_name']; ?>
            </div>
            <div class="menuarea">
                <ul>
                    <li><a href="<?= BASE_URL; ?>"><span class="icon-home"> Home</span></a></li>
                    <li><a href="<?= BASE_URL; ?>/permissions"><span class="icon-lock"> Permissões</span></a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="top">
                <div class="top_right icon-notext"><a href="<?= BASE_URL; ?>/login/logout"><span class="icon-logout"> Sair</span></a></div>
                <div class="top_right icon-notext"><span class="icon-user"></span> <?= $viewData['user_email']; ?></div>
            </div>
            <div class="area">
                <?php $this->loadViewInTemplate($viewName, $viewData); ?>
            </div>
        </div>
        
        <script src="<?= BASE_URL; ?>/assets/js/jquery-3.3.1.min.js"></script>
        <script src="<?= BASE_URL; ?>/assets/js/script.js"></script>
    </body>
</html>
