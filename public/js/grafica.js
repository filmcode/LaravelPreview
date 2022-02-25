'use strict';
// DOM
const _token = document.querySelector('[name=_token]').value;
// ajax

const ajaxGrafica = (statusGrafica) => {
    return new Promise((resolve, reject) => {
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(JSON.parse(this.responseText));
                resolve(JSON.parse(this.responseText));
            }
        }
        xhttp.open("POST", "/ajaxGrafica");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`_token=${_token}&status=${statusGrafica}`);
    });
}

window.addEventListener('load', async() => {
    const dataChart = await ajaxGrafica(statusGrafica.value);
    console.log(dataChart);
    graficaChart(dataChart);
})

const graficaChart = dataChart => {
    // chart
    const ctx = document.getElementById('myChart');
    let chartStatus = Chart.getChart("myChart");
    if (chartStatus != undefined) {
        chartStatus.destroy();
    }
    const myChart = new Chart(ctx.getContext('2d'), {
        type: 'bar',
        data: {
            labels: dataChart['labels'],
            datasets: [{
                maxBarThickness: 80,
                label: '',
                data: dataChart['datos'],
                backgroundColor: dataChart['bg'],
                borderWidth: 0
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },

            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

}

statusGrafica.addEventListener('change', async() => {
    const dataChart = await ajaxGrafica(statusGrafica.value);
    // mostrar grafica
    graficaChart(dataChart);
});