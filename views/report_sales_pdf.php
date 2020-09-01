<link rel="stylesheet" href="<?=BASE_URL; ?>/assets/css/report.css" />

<h1>Relatórios de Vendas</h1>
    <?php
        if($filters['client_name'] != '' || $filters['period1'] != '' || $filters['period2'] != '' || $filters['status'] != '') {
    ?>
<fieldset>
<?php
if(isset($filters['client_name']) && !empty($filters['client_name'])) {
    echo "Filtrando pelo cliente: ". $filters['client_name']."<br />";
}

if(!empty($filters['period1']) && !empty($filters['period2'])) {
    echo "No período: ".date('d/m/Y', strtotime($filters['period1']))." a ".date('d/m/Y', strtotime($filters['period2']))."<br />";
}

if($filters['status'] != '') {
    echo "Filtrado com status: ".$statuses[$filters['status']];
}
?>
</fieldset>

<?php echo "<br/>"; } ?>
<div align="right">
    <small>
        <?php
            date_default_timezone_set('America/Sao_Paulo');
            echo date("d/m/Y  H:i:s"); 
        ?>
    </small>
</div>
<hr/>
<table width="100%">
    <tr>
        <th>#</th>
        <th>Nome do Cliente</th>
        <th>Data</th>
        <th>Status</th>
        <th>Valor</th>
    </tr>
    <?php $i=0; ?>
    <?php foreach($sales_list as $item): ?>
    <?php $i++; ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $item['name']; ?></td>
        <td><?= date('d/m/Y', strtotime($item['date_sale'])); ?></td>
        <td><?= $statuses[$item['status']]; ?></td>
        <td>R$ <?= number_format($item['total_price'], 2, ',', '.'); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<hr/>
<div class="rodape-rel">
    <small>Unidasnet | ERP v1.0</small>
</div>
