<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=BASE_URL; ?>/assets/css/login.css" />
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/icons.css" />
    <title>Unidasnet | ERP</title>
</head>
<body>
    <section>
        <div class="loginarea">
            <div class="loginarea-content">
                <h2>Login de Acesso</h2>
                <form method="POST" action="">
                    <input type="email" name="email" placeholder="Digite seu e-mail" value="admin@gmail.com">
                    <input type="password" name="password" placeholder="Digite sua senha" value="123"><br/>
                    <button type="submit" class="icon-login icon-notext"> Entrar</button>

                    <?php if(isset($error) && !empty($error)): ?>
                    <div class="warning"><?= $error; ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </section>
</body>
</html>