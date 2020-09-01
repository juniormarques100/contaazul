<h1>Usuários - Editar</h1>

<input id="msg" type="hidden" value="<?= $error_msg; ?>">

<?php if(isset($error_msg) && !empty($error_msg)): ?>
    <div class="warn">
        <span><?= $error_msg; ?></span>
        <span id="closed" class="icon-cancel"></span>
    </div>
<?php endif; ?>

<form method="POST">

    <label for="email">E-mail</label><br/>
    <input type="text" value="<?= $users_info['email']; ?>" disabled><br/><br/>

    <label for="password">Senha</label><br/>
    <input type="password" name="password"/><br/><br/>

    <label for="group">Grupo de Permissões</label><br/>
    <select name="group" id="group" required>
        <?php foreach($group_list as $g): ?>
            <option value="<?= $g['id']; ?>" <?=($g['id'] == $users_info['id_group'])?'selected=selected':''?>><?= $g['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <br/><br/>

    <input id="add" type="submit" value="Editar" />

</form>