<script>
    var attendanceChartData = @json($attendanceEmployeeChart);

    var dataPresent = attendanceChartData.map(item => item.attendance_present);
    var dataPermit = attendanceChartData.map(item => item.attendance_permit);
    var dataSick = attendanceChartData.map(item => item.attendance_sick);
    var dataAlpha = attendanceChartData.map(item => item.attendance_alpha);

    var options = {
        series: [
            dataPermit.reduce((a, b) => a + b, 0),
            dataPresent.reduce((a, b) => a + b, 0),
            dataSick.reduce((a, b) => a + b, 0),
            dataAlpha.reduce((a, b) => a + b, 0)],
        chart: {
            type: 'donut',
            height: 350
        },
        dataLabels: {
            enabled: false
        },
        // labels: ['Izin', 'Masuk', 'Sakit', 'Alpha'],
        labels: false,
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }],
        colors: ['#5D87FF', '#13DEB9', '#FFAE1F', '#FA896B']
    };

    var chart = new ApexCharts(document.querySelector("#chart-employee"), options);
    chart.render();
</script>
