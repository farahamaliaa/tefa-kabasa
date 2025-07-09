<script>
    var ChartData = @json($charts);

    var categories = ChartData.map(item => item.month);
    var data1 = ChartData.map(item => item.violation);
    var data2 = ChartData.map(item => item.repair);

    var options = {
        series: [{
                name: "Pelanggaran",
                data: data1
            },
            {
                name: "Perbaikan",
                data: data2
            },
        ],
        chart: {
            height: 400,
            type: 'line',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            },
        },
        colors: ['#FA896B', '#13DEB9'], // Custom colors for the lines
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 0, 5]
        },
        title: {
            text: 'Statistik Pelanggaran',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function(val, opts) {
                return val + ' - <strong>' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] +
                    '</strong>'
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: categories,
        },
        tooltip: {
            y: [{
                    title: {
                        formatter: function(val) {
                            return val + " (mins)"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val + " per session"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val;
                        }
                    }
                }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart-violation"), options);
    chart.render();
</script>
