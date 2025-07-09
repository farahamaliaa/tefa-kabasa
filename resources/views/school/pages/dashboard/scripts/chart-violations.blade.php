<script>
    var violationChartData = @json($violationChart);

    var categories = violationChartData.map(item => item.month);
    var data1 = violationChartData.map(item => item.violation);

    var options_line = {
        series: [{
            name: "Pelanggaran",
            data: data1,
        }],
        chart: {
            height: 350,
            type: "line",
            fontFamily: '"Nunito Sans",sans-serif',
            zoom: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        dataLabels: {
            enabled: false,
        },
        colors: ["#FA896B"],
        stroke: {
            curve: "straight",
        },
        grid: {
            row: {
                colors: ["rgba(255, 223, 186, 0.5)", "rgba(255, 255, 255, 0.5)"],
            },
            borderColor: "transparent",
        },
        xaxis: {
            categories: categories,
            labels: {
                style: {
                    colors: [
                        "#a1aab2", "#a1aab2", "#a1aab2", "#a1aab2", "#a1aab2",
                        "#a1aab2", "#a1aab2", "#a1aab2", "#a1aab2", "#a1aab2",
                        "#a1aab2", "#a1aab2"
                    ],
                },
            },
        },
        yaxis: {
            labels: {
                style: {
                    colors: [
                        "#a1aab2", "#a1aab2", "#a1aab2", "#a1aab2", "#a1aab2", "#a1aab2",
                    ],
                },
            },
        },
        tooltip: {
            theme: "dark",
        },
    };

    var chart_line_basic = new ApexCharts(
        document.querySelector("#chart-line-basic"),
        options_line
    );
    chart_line_basic.render();
</script>
