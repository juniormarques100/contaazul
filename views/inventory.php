<h1>Estoque</h1>

<div class="action-clients">
    <?php if($add_permission): ?>
        <div class="button"><a href="<?= BASE_URL; ?>/inventory/add" >
        <span class="icon-add"> Adicionar Estoque</span></a></div>
    <?php endif; ?>
    
    <div class="search-icon-input">
        <div class="icon-main">
            <span class="icon-search"></span>
        </div>
        
        <input type="text" id="busca" data-type="search_inventory"/>
    </div>
</div>

<table border="0" width="100%">
    <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quant.</th>
        <th>Quant. Min.</th>
        <th>Ações</th>
    </tr>
    <?php foreach($inventory_list as $item): ?>
    <tr>
        <td style="width: 40%"><?= $item['name']; ?></td>
        <td style="width: 12%;">R$ <?= number_format($item['price'],2,',','.'); ?></td>
        <td style="width: 12%; text-align: center;">
            <?php
                if($item['min_quant'] > $item['quant']) {
                    echo "<span style=color:red; font-weight:700;>".$item['quant']."</span>";
                } else {
                    echo $item['quant']; 
                }
            ?>
        </td>

        <td style="width: 12%; text-align: center;"><?= $item['min_quant']; ?></td>
        <td style="width: 24%;">
            <?php if($edit_permission): ?>
                <div class="button button_small">
                    <a href="<?= BASE_URL; ?>/inventory/edit/<?= $item['id']; ?>"><span class="icon-edit"> Editar</span></a>
                </div>
                <div class="button button_small">
                    <a href="<?= BASE_URL; ?>/inventory/delete/<?= $item['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')"><span class="icon-del"> Excluir</span></a>
                </div>
            <?php else: ?>
                <div class="button button_small">
                    <a href="<?= BASE_URL; ?>/inventory/view/<?= $item['id']; ?>"><span class="icon-search"> Visualizar</span></a>
                </div>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>