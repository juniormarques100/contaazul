<h1>Compras</h1>

<?php ?>
    <div class="button"><a href="<?= BASE_URL; ?>/purchases/add" >
    <span class="icon-add"> Adicionar Compra</span></a></div>
<?php ?>

<table border="0" width="100%">
    <tr>
        <th>Data</th>
        <th>Valor</th>
        <th>Ações</th>
    </tr>
    <?php foreach($purchases_list as $item): ?>
    <tr>
        <td style="width:20%;"><?= date('d/m/Y', strtotime($item['date_purchase'])); ?></td>
        <td>R$ <?= number_format($item['total_price'], 2, ',', '.'); ?></td>
        <td style="width:20%;">
            <div class="button button_small">
                <a href="<?= BASE_URL; ?>/purchases/edit/<?= $item['id']; ?>"><span class="icon-edit"> Editar</span></a>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
</table>