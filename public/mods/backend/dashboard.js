$(document).ready(function () {
    renderSalesChart();
    renderIndikatorChart();
});


function getChartColorsArray(selector) {
    const colors = $(selector).attr("data-colors");
    return JSON.parse(colors).map(color => {
        color = color.replace(" ", "");
        if (!color.includes("--")) return color;

        const cssVar = getComputedStyle(document.documentElement).getPropertyValue(color);
        return cssVar.trim() || undefined;
    });
}

// Grafik Penjualan (ApexCharts)
async function renderSalesChart() {
    const barColor = getChartColorsArray("#sales-chart");
    const { data: chartData } = await requestChartData('sales-chart', 'seller');

    const options = {
        chart: {
            height: 350,
            type: 'area',
            zoom: { enabled: false },
            toolbar: { show: false },
        },
        dataLabels: { enabled: false },
        stroke: { curve: 'straight' },
        series: [{
            name: 'Jumlah Penjualan',
            data: chartData.map(item => item.income),
        }],
        colors: barColor,
        grid: { borderColor: "#f1f1f1" },
        xaxis: {
            categories: chartData.map(item => item.month),
        },
        yaxis: {
            opposite: true,
            labels: {
                formatter: value => 'Rp ' + new Intl.NumberFormat().format(value),
            },
        },
    };

    const chart = new ApexCharts(document.querySelector('#sales-chart'), options);
    chart.render();
}

async function requestChartData(chartRouteName, prefix = 'administrator') {
    const baseUrl = $('meta[name=base-url]').attr('content');
    const res = await fetch(`${baseUrl}/${prefix}/dashboard/${chartRouteName}`);
    const data = await res.json();
    return data;
}

// Grafik Target vs Realisasi Indikator (Chart.js)
function renderIndikatorChart() {
    const canvas = document.getElementById('grafik-indikator');
    if (!canvas) return;

    // Cegah duplikat grafik
    if (window.grafikIndikatorChart instanceof Chart) {
        window.grafikIndikatorChart.destroy();
    }

    const ctx = canvas.getContext('2d');

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: window.grafikLabels || [],
            datasets: [
                {
                    label: 'Target',
                    data: window.grafikTarget || [],
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                },
                {
                    label: 'Realisasi',
                    data: window.grafikRealisasi || [],
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: { mode: 'index', intersect: false },
                legend: { position: 'top' },
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Nilai'
                    },
                    ticks: { stepSize: 1 }
                },
                x: {
                    ticks: {
                        autoSkip: false,
                        maxRotation: 45,
                        minRotation: 45
                    }
                }
            }
        }
    });

    window.grafikIndikatorChart = chart;
}
