<h1>Permissões</h1>

<div class="tabarea">
    <div class="tabitem activetab">Grupos de Permissões</div>
    <div class="tabitem">Permissões</div>
</div>
<div class="tabcontent">
    <div class="tabbody" style=display:block;>
        <div class="button"><a href="<?= BASE_URL; ?>/permissions/add_group" >
        <span class="icon-add"> Adicionar Grupo de Permissões</span></a></div>

        <table border="0" width="100%">
            <tr>
                <th>Grupo de Permissões</th>
                <th>Ações</th>
            </tr>
            <?php foreach($permissions_groups_list as $item): ?>
            <tr>
                <td><?= $item['name']; ?></td>
                <td style="width: 225px; text-align: center;">
                    <div class="button button_small">
                        <a href="<?= BASE_URL; ?>/permissions/edit_group/<?= $item['id']; ?>"><span class="icon-edit"> Editar</span></a>
                    </div>
                    <div class="button button_small">
                        <a href="<?= BASE_URL; ?>/permissions/delete_group/<?= $item['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')"><span class="icon-del"> Excluir</span></a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>
    </div>
    <div class="tabbody">

        <div class="button"><a href="<?= BASE_URL; ?>/permissions/add" ><span class="icon-add"> Adicionar Permissão</span></a></div>

        <table border="0" width="100%">
            <tr>
                <th>Permissão</th>
                <th>Ações</th>
            </tr>
            <?php foreach($permissions_list as $item): ?>
            <tr>
                <td><?= $item['name']; ?></td>
                <td style="width: 225px; text-align: center;">
                    <div class="button button_small">
                        <a href="<?= BASE_URL; ?>/permissions/delete/<?= $item['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')"><span class="icon-del"> Excluir</span></a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>