
<script>
    var teacherAttendance = @json($chartTeacherAttendance);

    var present = teacherAttendance.chartPresent;
    var permit = teacherAttendance.chartPermit;
    var alpha = teacherAttendance.chartAlpha;

    var options = {
        series: [present, permit, alpha], // Data numerik untuk 'Masuk', 'Izin', 'Alpha'
        chart: {
            type: 'donut',
            width: 450 // Perbesar chart
        },
        labels: ['Masuk', 'Izin', 'Alpha'], // Label keterangan
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

    var chart = new ApexCharts(document.querySelector("#chart-teacher"), options);
    chart.render();
</script>
