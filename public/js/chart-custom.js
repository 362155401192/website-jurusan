let allData = [];

fetch('/get-chart-data')
    .then(res => res.json())
    .then(res => {
        allData = res.data;

        const select = document.getElementById('indikatorSelect');

        res.indikator_options.forEach(opt => {
            const option = document.createElement('option');
            option.value = opt.id;

            // Potong label jika lebih dari 50 karakter
            const maxLength = 80;
            const label = opt.label.length > maxLength
                ? opt.label.slice(0, maxLength) + '...'
                : opt.label;

            option.textContent = label;
            option.title = opt.label; // Untuk tooltip saat hover
            select.appendChild(option);
        });

        if (res.indikator_options.length) {
            select.value = res.indikator_options[0].id;
            renderCharts(select.value);
        }

        select.addEventListener('change', e => renderCharts(e.target.value));
    });
let chartTriwulan = null;
let chartAkhir = null;

function renderCharts(id) {
    const data = allData.find(d => d.id == id);

    // BERSIHKAN CHART LAMA
    if (chartTriwulan) {
        chartTriwulan.destroy();
    }
    if (chartAkhir) {
        chartAkhir.destroy();
    }

    const triwulanChartOptions = {
        chart: {
            type: 'bar',
            height: 350
        },
        series: [
            {
                name: 'Target',
                data: data.triwulan_target
            },
            {
                name: 'Realisasi',
                data: data.triwulan_realisasi
            }
        ],
        xaxis: {
            categories: ['Triwulan 1', 'Triwulan 2', 'Triwulan 3']
        },
        title: {
            text: 'Target vs Realisasi per Triwulan'
        }
    };

    const akhirChartOptions = {
        chart: {
            type: 'donut',
            height: 350
        },
        series: [data.target_akhir, data.realisasi_akhir],
        labels: ['Target Akhir', 'Realisasi Akhir'],
        title: {
            text: 'Perbandingan Target & Realisasi Akhir'
        },
        legend: {
            position: 'bottom'
        }
    };

    // SIMPAN KE VARIABEL UNTUK BISA DI-DESTROY NANTI
    chartTriwulan = new ApexCharts(document.querySelector("#chartTriwulan"), triwulanChartOptions);
    chartAkhir = new ApexCharts(document.querySelector("#chartAkhir"), akhirChartOptions);

    chartTriwulan.render();
    chartAkhir.render();
}

