<h1>Clientes</h1>

<div class="action-clients">
    <?php if($edit_permission): ?>
    <div class="button"><a href="<?= BASE_URL; ?>/clients/add" >
    <span class="icon-add"> Adicionar Clientes</span></a></div>
    <?php endif; ?>
    
    <div class="search-icon-input">
        <div class="icon-main">
            <span class="icon-search"></span>
        </div>
        
        <input type="text" id="busca" data-type="search_clients"/>
    </div>
</div>


<table border="0" width="100%">
    <tr>
        <th>Cliente</th>
        <th>Telefone</th>
        <th>Cidade</th>
        <th>Estrelas</th>
        <th>Ações</th>
    </tr>
    <?php foreach($clients_list as $c): ?>
    <tr>
        <td><?= $c['name']; ?></td>
        <td style="width: 150px;"><?= $c['phone']; ?></td>
        <td><?= $c['address_city']; ?></td>
        <td style="width: 100px; text-align: center;"><?= $c['stars']; ?></td>
        <td style="width: 225px; text-align: center;">
            <?php if($edit_permission): ?>
                <div class="button button_small">
                    <a href="<?= BASE_URL; ?>/clients/edit/<?= $c['id']; ?>"><span class="icon-edit"> Editar</span></a>
                </div>
                <div class="button button_small">
                    <a href="<?= BASE_URL; ?>/clients/delete/<?= $c['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')"><span class="icon-del"> Excluir</span></a>
                </div>
            <?php else: ?>
                <div class="button button_small">
                    <a href="<?= BASE_URL; ?>/clients/view/<?= $c['id']; ?>"><span class=""> Visualizar</span></a>
                </div>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="pagination">
    <?php for($q=1; $q <= $page_count; $q++): ?>
        <div class="pag_item <?=($q == $p)?'pag_active':''; ?>"><a href="<?= BASE_URL; ?>/clients?p=<?= $q; ?>"><?= $q; ?></a></div>
    <?php endfor; ?>

</div>