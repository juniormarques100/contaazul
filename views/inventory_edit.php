<h1>Produtos - Editar</h1>

<input id="msg" type="hidden" value="<?= $error_msg; ?>">

<?php if(isset($error_msg) && !empty($error_msg)): ?>
    <div class="warn">
        <span><?= $error_msg; ?></span>
        <span id="closed" class="icon-cancel"></span>
    </div>
<?php endif; ?>

<form method="POST">

    <label for="name">Nome</label><br/>
    <input type="text" name="name" value="<?= $inventory_info['name']; ?>" required/><br/><br/>

    <label for="price">Preço</label><br/>
    <input type="text" name="price" value="<?= number_format($inventory_info['price'], 2); ?>" required/><br/><br/>

    <label for="quant">Quantidade em Estoque</label><br/>
    <input type="number" name="quant" value="<?= $inventory_info['quant']; ?>" required/><br/><br/>

    <label for="min_quant">Quant. Miníma em Estoque</label><br/>
    <input type="number" name="min_quant" value="<?= $inventory_info['min_quant']; ?>" required/><br/><br/>

    <input id="add" type="submit" value="Salvar" />

</form>