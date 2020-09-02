<h1>Compras - Adicionar</h1>

<form method="POST">

    <label for="total_price">Total da Compra</label><br/>
    <input type="text" name="total_price" id="total_price" disabled="disabled"/>
    <br/><br/>

    <label for="date_purchase">Data da Compra</label><br/>
    <input type="date" name="date_purchase" />
    <br/><br/>
    
    <h3>Produtos</h3>

    <fieldset>
        <legend>Adicionar Produto</legend>
        <input type="text" id="add_prod" data-type="search_products"/>
    </fieldset>

    <table border="0" width="100%" id="products_table">
        <tr>
            <th>Nome do Produto</th>
            <th>Quantidade</th>
            <th>Preço Unitário</th>
            <th>Sub-Total</th>
            <th>Excluir</th>
        </tr>
    </table>
    <hr/>

    <input type="submit" value="Adicionar Compra" />


</form>