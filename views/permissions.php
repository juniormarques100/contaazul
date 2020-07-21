<h1>Permissões</h1>

<div class="tabarea">
    <div class="tabitem activetab">Grupos de Permissões</div>
    <div class="tabitem">Permissões</div>
</div>
<div class="tabcontent">
    <div class="tabbody style=display:block;">
        GRUPOS DE PERMISSÕES
    </div>
    <div class="tabbody">

        <a href="<?= BASE_URL; ?>/permissions/add">Adicionar Permissão</a>

        <table border="0" width="100%">
            <tr>
                <th>Nome da Permissão</th>
                <th>Ações</th>
            </tr>
            <?php foreach($permissions_list as $item): ?>
            <tr>
                <td><?= $item['name']; ?></td>
                <td>
                    <a href="<?= BASE_URL; ?>/permissions/delete/<?= $item['id']; ?>">[excluir]</a>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>