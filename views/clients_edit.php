<h1>Clientes - Editar</h1>

<input id="msg" type="hidden" value="<?= $error_msg; ?>">

<?php if(isset($error_msg) && !empty($error_msg)): ?>
    <div class="warn">
        <span><?= $error_msg; ?></span>
        <span id="closed" class="icon-cancel"></span>
    </div>
<?php endif; ?>

<form method="POST">

    <label for="name">Nome</label><br/>
    <input type="text" name="name" value="<?= $clients_info['name']; ?>" required/><br/><br/>

    <label for="email">E-mail</label><br/>
    <input type="email" name="email" value="<?= $clients_info['email']; ?>"/><br/><br/>

    <label for="Telefone">Telefone</label><br/>
    <input type="text" name="phone" value="<?= $clients_info['phone']; ?>"/><br/><br/>

    <label for="stars">Estrelas</label><br/>
    <select name="stars" id="stars">
        <?php for($i=1; $i <= 5; $i++): ?>
            <?php if($i > 1): ?>
                <option value="<?= $i; ?>" <?= ($i == $clients_info['stars'])?'selected="selected"':'' ?>><?= $i; ?> Estrelas</option>
            <?php else: ?>
                <option value="<?= $i; ?>" <?= ($i == $clients_info['stars'])?'selected="selected"':'' ?>><?= $i; ?> Estrela</option>
            <?php endif; ?>
        <?php endfor; ?>
    </select>
    <br/><br/>

    <label for="internal_obs">Observações Internas</label><br/>
    <textarea name="internal_obs" id="internal_obs"><?= $clients_info['internal_obs']; ?></textarea>
    <br/><br/>

    <label for="address_zipcode">CEP</label><br/>
    <input type="text" name="address_zipcode" value="<?= $clients_info['address_zipcode']; ?>"/><br/><br/>

    <label for="address">Rua</label><br/>
    <input type="text" name="address" value="<?= $clients_info['address']; ?>"/><br/><br/>

    <label for="address_number">Número</label><br/>
    <input type="text" name="address_number" value="<?= $clients_info['address_number']; ?>"/><br/><br/>

    <label for="address2">Complemento</label><br/>
    <input type="text" name="address2" value="<?= $clients_info['address2']; ?>"/><br/><br/>

    <label for="address_neighb">Bairro</label><br/>
    <input type="text" name="address_neighb" value="<?= $clients_info['address_neighb']; ?>"/><br/><br/>

    <label for="address_city">Cidade</label><br/>
    <input type="text" name="address_city" value="<?= $clients_info['address_city']; ?>"/><br/><br/>

    <label for="address_state">Estado</label><br/>
    <input type="text" name="address_state" value="<?= $clients_info['address_state']; ?>"/><br/><br/>

    <label for="address_country">País</label><br/>
    <input type="text" name="address_country" value="<?= $clients_info['address_country']; ?>"/><br/><br/>

    <input id="add" type="submit" value="Salvar" />

</form>