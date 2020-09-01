<h1>Vendas - Editar</h1>

<strong>Nome do Cliente:</strong><br/>
<?= $sales_info['info']['client_name']; ?><br/><br/>

<strong>Data da Venda:</strong><br/>
<?= date('d/m/Y', strtotime($sales_info['info']['date_sale'])); ?><br/><br/>

<strong>Valor da Venda:</strong><br/>
<?= "R$ ".number_format($sales_info['info']['total_price'],2,',','.'); ?><br/><br/>

<strong>Status da Venda</strong><br/>
<?php if($permission_edit): ?>
<form method="POST" action="">
    <select name="status" id="">
        <?php foreach($statuses as $key => $status): ?>
            <option value="<?= $key; ?>" <?php echo ($key == $sales_info['info']['status']?'selected=selected':''); ?>><?= $status; ?></option>
        <?php endforeach; ?>
    </select><br/><br/> 
    <input type="submit" value="Salvar" />
</form>
<?php else: ?>
    <?php echo $statuses[$sales_info['info']['status']]; ?>
<?php endif; ?>
<hr/>

<table border='0' width="100%">
    <tr>
        <th>Nome do Produto</th>
        <th>Quantidade</th>
        <th>Preço Unitário</th>
        <th>Preço Total</th>
    </tr>
    <?php foreach($sales_info['products'] as $item): ?>
        <tr>
            <td><?= $item['name']; ?></td>
            <td><?= $item['quant']; ?></td>
            <td><?= "R$ ".number_format($item['sale_price'],2,',','.'); ?></td>
            <td>
                <?php
                    $subtotal = $item['quant'] * $item['sale_price'];
                    echo "R$ ".number_format($subtotal,2,',','.');
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>