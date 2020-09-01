<h1>Relatórios de Vendas</h1>

<form style="border: 1px solid #555; border-radius: 5px; padding:20px 0;" method="GET" onsubmit="return OpenPopup(this)">
    <div class="report-grid-4">
        Nome do Cliente:<br/>
        <input type="text" name="client_name" />
    </div>
    <div class="report-grid-4">
        Período:<br/>
        <input type="date" name="period1" /><br/>
        até<br/>
        <input type="date" name="period2" /><br/>
    </div>
    <div class="report-grid-4">
        Status da Venda:<br/>
        <select name="status" id="">
            <option value="">Todos os status</option>
            <?php foreach($statuses as $key => $chave): ?>
                <option value="<?=$key;?>"><?=$chave;?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="report-grid-4">
        Ordenação:<br/>
        <select name="order" id="">
            <option value="date_desc">Mais recente</option>
            <option value="date_asc">Mais antigo</option>
            <option value="date_desc">Status da venda</option>            
        </select>
    </div>
    
    <div style="clear:both"></div>

    <div style="text-align:center"">
        <input type="submit" value="Gerar relatório">
    </div>
</form>