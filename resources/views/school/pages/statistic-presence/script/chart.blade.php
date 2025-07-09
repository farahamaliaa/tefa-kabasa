{{-- statistik siswa --}}
<script>
    // Fetch the attendance data from the Blade template
    var attendanceData = @json($data);

    // Process the data for the chart
    var classrooms = attendanceData.map(function(item) {
        return item.classroom;
    });

    var presentData = attendanceData.map(function(item) {
        return item.data.present;
    });

    var permitData = attendanceData.map(function(item) {
        return item.data.permit;
    });

    var sickData = attendanceData.map(function(item) {
        return item.data.sick;
    });

    var alphaData = attendanceData.map(function(item) {
        return item.data.alpha;
    });

    var optionsStudent = {
        series: [{
            name: 'Masuk',
            data: presentData
        }, {
            name: 'Izin',
            data: permitData
        }, {
            name: 'Sakit',
            data: sickData
        }, {
            name: 'Alfa',
            data: alphaData
        }],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
        },
        plotOptions: {
            bar: {
                horizontal: true
            }
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        xaxis: {
            categories: classrooms, // Set classrooms as categories
            labels: {
                show: false
            }
        },
        yaxis: {
            title: {
                text: undefined
            }
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + " siswa";
                }
            }
        },
        fill: {
            opacity: 1
        },
        legend: {
            show: false
        },
        colors: ['#13DEB9', '#5D87FF', '#FFAE1F', '#FA896B']
    };

    var chartStudent = new ApexCharts(document.querySelector("#chart-student"), optionsStudent);
    chartStudent.render();
</script>
