<h1>Clientes - Dados</h1>

<label for="name">Nome</label><br/>
<input type="text" name="name" value="<?= $clients_info['name']; ?>" disabled/><br/><br/>

<label for="email">E-mail</label><br/>
<input type="email" name="email" value="<?= $clients_info['email']; ?>" disabled/><br/><br/>

<label for="Telefone">Telefone</label><br/>
<input type="text" name="phone" value="<?= $clients_info['phone']; ?>" disabled/><br/><br/>

<label for="stars">Estrelas</label><br/>
<select name="stars" id="stars" disabled>
    <?php for($i=1; $i <= 5; $i++): ?>
        <?php if($i > 1): ?>
            <option value="<?= $i; ?>" <?= ($i == $clients_info['stars'])?'selected=selected':'' ?>><?= $i; ?> Estrelas</option>
        <?php else: ?>
            <option value="<?= $i; ?>" <?= ($i == $clients_info['stars'])?'selected=selected':'' ?>><?= $i; ?> Estrela</option>
        <?php endif; ?>
    <?php endfor; ?>
</select>
<br/><br/>

<label for="internal_obs">Observações Internas</label><br/>
<textarea name="internal_obs" id="internal_obs" disabled><?= $clients_info['internal_obs']; ?></textarea>
<br/><br/>

<label for="address_zipcode">CEP</label><br/>
<input type="text" name="address_zipcode" value="<?= $clients_info['address_zipcode']; ?>" disabled/><br/><br/>

<label for="address">Rua</label><br/>
<input type="text" name="address" value="<?= $clients_info['address']; ?>" disabled/><br/><br/>

<label for="address_number">Número</label><br/>
<input type="text" name="address_number" value="<?= $clients_info['address_number']; ?>" disabled/><br/><br/>

<label for="address2">Complemento</label><br/>
<input type="text" name="address2" value="<?= $clients_info['address2']; ?>" disabled/><br/><br/>

<label for="address_neighb">Bairro</label><br/>
<input type="text" name="address_neighb" value="<?= $clients_info['address_neighb']; ?>" disabled/><br/><br/>

<label for="address_city">Cidade</label><br/>
<input type="text" name="address_city" value="<?= $clients_info['address_city']; ?>" disabled/><br/><br/>

<label for="address_state">Estado</label><br/>
<input type="text" name="address_state" value="<?= $clients_info['address_state']; ?>" disabled/><br/><br/>

<label for="address_country">País</label><br/>
<input type="text" name="address_country" value="<?= $clients_info['address_country']; ?>" disabled/><br/><br/>