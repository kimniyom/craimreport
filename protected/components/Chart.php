<?php

Class Chart {

    function ChartBar($Id = '', $Type = '', $Categories = '', $Value = '', $Seriesname = '', $Title = '', $color = '') {
        $str = "<script type=\"text/javascript\">
            $(function () {
            $('#$Id').highcharts({
            chart: {
                backgroundColor: '#e7f1f5',
                type: '$Type'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: '$Title'
            },
            xAxis: {
                categories: [" . $Categories . "],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'จำนวน (บาท)',
                    align: 'high'
                },
                labels: {
                    formatter: function () {
                        return this.value;
                    },
                    overflow: 'justify',
                }
            },
            tooltip: {
                valueSuffix: ' บาท'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: '$Seriesname',
                    data: [" . $Value . "],
                    color: '$color'
                }]
        });
       });";

        $str .= "</script>";

        return $str;
    }

}
