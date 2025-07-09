<script>
    var studentChartData = @json($studentChart);

    var late = studentChartData.chartLate;
    var sick = studentChartData.chartSick;
    var alpha = studentChartData.chartAlpha;

    var options = {
        series: [late, sick, alpha], // Data numerik untuk 'Masuk', 'Izin', 'Alpha'
        chart: {
            type: 'donut',
            width: 450 // Perbesar chart
        },
        labels: ['Telat', 'Izin', 'Alpha'], // Label keterangan
        colors: ['#5D87FF', '#FFAE1F', '#FA896B'], // Custom warna chart
        legend: {
            position: 'bottom', // Pindahkan keterangan ke bawah chart
            horizontalAlign: 'center', // Selaraskan secara horizontal
            itemMargin: {
                horizontal: 20, // Atur jarak horizontal antar keterangan
                vertical: 10 // Atur jarak vertikal antar keterangan
            }
        },
        dataLabels: {
            enabled: false // Menghilangkan persen
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 400 // Atur ukuran lebih kecil untuk layar kecil
                },
                legend: {
                    position: 'bottom',
                    itemMargin: {
                        horizontal: 20, // Tetap atur jarak untuk perangkat kecil
                        vertical: 10
                    }
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#chart-student"), options);
    chart.render();
</script>
