<h1>Permissões - Adicionar Grupo de Permissões</h1>

<form method="POST">

    <label for="name">Nome do Grupo de Permissões</label><br/>
    <input type="text" name="name" /><br/><br/>

    
    <label>Permissões</label><br/>
    <div class="p_check">
        <?php foreach($permissions_list as $p): ?>
            <div class="p_item">
                <input type="checkbox" name="permissions[]" value="<?= $p['id']; ?>" id="p_<?= $p['id']; ?>"/>
                <label for="p_<?= $p['id']; ?>"><span><?= $p['name']; ?></span></label>
            </div>
        <?php endforeach; ?>
    </div>
    <br/><br/>

    <input type="submit" value="Adicionar" />

</form>