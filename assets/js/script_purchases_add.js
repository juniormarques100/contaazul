function updateSubtotal(obj) {
    var quant = $(obj).val();

    if(quant <= 0) {
        $(obj).val(1);
        quant = 1;
    }

    var price = $(obj).attr('data-price');
    var subtotal = quant * price;

    $(obj).closest('tr').find('.subtotal').html('R$ '+subtotal);

    updateTotal();
}

function updateTotal() {
    var total = 0;

    for(q=0; q < $('.p_quant').length; q++) {
        var quant = $('.p_quant').eq(q);

        var price = quant.attr('data-price');
        var subtotal = price * parseInt(quant.val());

        total += subtotal;
    }

    $('input[name=total_price]').val(total);
}

function excluirProd(obj) {
    $(obj).closest('tr').remove();
}

function addProd(obj) {
    $('#add_prod').val('');
    var id = $(obj).attr('data-id');
    var name = $(obj).attr('data-name');
    var price = $(obj).attr('data-price');

    $('.searchresults').hide();

    if($('input[name="quant['+id+']"]').length == 0) {
        var tr = '<tr>';
        tr += '<td>'+name+'</td>';
        tr += '<td><input style="width:50px;" type="number" name="quant['+id+']" class="p_quant" value="1" onchange="updateSubtotal(this)" data-price="'+price+'"/></td>';
        tr += '<td>'+price+'</td>';
        tr += '<td class="subtotal">R$ '+price+'</td>';
        tr += '<td><a href="javascript:;" onclick="excluirProd(this)">Excluir</a></td>';
        tr += '</tr>';
        
        $('#products_table').append(tr);
    }

    updateTotal();
}