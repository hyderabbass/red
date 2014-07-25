<script type="text/javascript">
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            }, credits: {
                enabled: false
            },
            title: {
                text: 'Average of last 4 weeks'
            },
            xAxis: {
                categories: ".$x_axis_with_label."
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Red Performance Evolution'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: -70,
                verticalAlign: 'top',
                y: 20,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black, 0 0 3px black'
                        }
                    }
                }
            },
            series: [
                {
                    name: 'Availability(60%)',
                    data: ".$points_availability_json."
                },
                {
                    name: 'Cooler(20%)',
                    data: ".$points_cooler_json."
                },
                {
                    name: 'Activation(20%)',
                    data: ".$points_activation_json."
                },
                {
                    type: 'spline',
                    name: 'Total',
                    data: ".$points_total_json.",
                    marker: {
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[3],
                        fillColor: 'white'
                    }
                }
            ]
        });
    });

</script>