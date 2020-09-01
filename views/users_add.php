<h1>Usuários - Adicionar</h1>

<input id="msg" type="hidden" value="<?= $error_msg; ?>">

<?php if(isset($error_msg) && !empty($error_msg)): ?>
    <div class="warn">
        <span><?= $error_msg; ?></span>
        <span id="closed" class="icon-cancel"></span>
    </div>
<?php endif; ?>

<form method="POST">

    <label for="email">E-mail</label><br/>
    <input type="email" name="email" required/><br/><br/>

    <label for="password">Senha</label><br/>
    <input type="password" name="password" required/><br/><br/>

    <label for="group">Grupo de Permissões</label><br/>
    <select name="group" id="group" required>
        <?php foreach($group_list as $g): ?>
            <option value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <br/><br/>

    <input id="add" type="submit" value="Adicionar" />

</form>