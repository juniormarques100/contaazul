<h1>Usuários</h1>

<div class="button"><a href="<?= BASE_URL; ?>/users/add" >
<span class="icon-add"> Adicionar Usuários</span></a></div>

<table border="0" width="100%">
    <tr>
        <th>Usuário</th>
        <th>Grupo de Permissões</th>
        <th>Ações</th>
    </tr>
    <?php foreach($users_list as $us): ?>
    <tr>
        <td><?= $us['email']; ?></td>
        <td><?= $us['name']; ?></td>
        <td style="width: 225px; text-align: center;">
            <?php if($edit_permission): ?>
                <div class="button button_small">
                    <a href="<?= BASE_URL; ?>/users/edit/<?= $us['id']; ?>"><span class="icon-edit"> Editar</span></a>
                </div>
                <div class="button button_small">
                    <a href="<?= BASE_URL; ?>/users/delete/<?= $us['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')"><span class="icon-del"> Excluir</span></a>
                </div>
            <?php else: ?>
                <div class="button button_small">
                    <a href="<?= BASE_URL; ?>/users/view/<?= $us['id']; ?>"><span class="icon-search"> Visualizar</span></a>
                </div>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>