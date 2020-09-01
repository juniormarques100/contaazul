<h1>Vendas</h1>

<?php ?>
    <div class="button"><a href="<?= BASE_URL; ?>/sales/add" >
    <span class="icon-add"> Adicionar Venda</span></a></div>
<?php ?>

<table border="0" width="100%">
    <tr>
        <th>Nome do Cliente</th>
        <th>Data</th>
        <th>Status</th>
        <th>Valor</th>
        <th>Ações</th>
    </tr>
    <?php foreach($sales_list as $item): ?>
    <tr>
        <td><?= $item['name']; ?></td>
        <td><?= date('d/m/Y', strtotime($item['date_sale'])); ?></td>
        <td><?= $statuses[$item['status']]; ?></td>
        <td>R$ <?= number_format($item['total_price'], 2, ',', '.'); ?></td>
        <td>
            <div class="button button_small">
                <a href="<?= BASE_URL; ?>/sales/edit/<?= $item['id']; ?>"><span class="icon-edit"> Editar</span></a>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
</table>