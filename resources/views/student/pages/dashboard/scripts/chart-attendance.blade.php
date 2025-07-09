
<script>
    var studentChartData = @json($chartAttendance);

    var present = studentChartData.present;
    var permit = studentChartData.permit;
    var alpha = studentChartData.alpha;

    var options = {
        series: [present, permit, alpha], // Data numerik untuk 'Masuk', 'Izin', 'Alpha'
        chart: {
            type: 'donut',
            width: 450 // Perbesar chart
        },
        labels: ['Masuk', 'Izin', 'Alpha'], // Label keterangan
        colors: ['#13DEB9', '#5D87FF', '#FA896B'], // Custom warna chart
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

    var chart = new ApexCharts(document.querySelector("#chart-attendance"), options);
    chart.render();
</script>
