var graf1 = new Chart(document.getElementById('graf1'), {
    type: 'line',
    data: {
        labels: list_days,
        datasets: [{
            label: ['Receita'],
            data:revenue_list,
            fill:false,
            backgroundColor: 'rgba(0, 0, 180, 0.5)',
            borderColor: 'rgba(0, 0, 180, 0.5)'
            
        }, {
            label: ['Despesa'],
            data:expenses_list,
            fill:false,
            backgroundColor: 'rgba(180, 0, 0, 0.5)',
            borderColor: 'rgba(180, 0, 0, 0.5)'
        }],
    },
});

var myChart = new Chart(document.getElementById('graf2'), {
    type: 'doughnut',
    data: {
        labels: ['Pago', 'Aguardando. Pgto.', 'Cancelado'],
        datasets: [{
            label: status_name_list,
            data: status_list,
            backgroundColor: [
                'rgba(255, 153, 0, 0.5)',
                'rgba(0, 0, 180, 0.5)',
                'rgba(180, 0, 0, 0.5)'
            ],
        }],
    },
});