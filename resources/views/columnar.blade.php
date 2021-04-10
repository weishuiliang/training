<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
@include('_header')
<body>
@include('_nav')
@include('_student_select')
<div id="container"></div>
<button id="large" onclick="setSize(800)">放大</button>
<button id="small" onclick="setSize(400)">缩小</button>
<script>
    var chart = Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: '{{$title}}'
        },
        subtitle: {
            text: '请点击按钮查看坐标轴变化'
        },
        xAxis: {
            // categories: ['一月', '二月', '三月', '四月', '五月', '六月',
            //     '七月', '八月', '九月', '十月', '十一月', '十二月']
            categories:<?php echo $exam_name_json;?>
        },
        yAxis: {
            labels: {
                x: -15
            },
            title: {
                text: '{{$ytitle}}'
            }
        },
        series: [{
            name: "{{$current_student_name}}",
            // data: [434, 523, 345, 785, 565, 843, 726, 590, 665, 434, 312, 432]
            data: [{{implode(',', $data)}}]

        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                // Make the labels less space demanding on mobile
                chartOptions: {
                    xAxis: {
                        labels: {
                            formatter: function () {
                                return this.value.replace('', '')
                            }
                        }
                    },
                    yAxis: {
                        labels: {
                            align: 'left',
                            x: 0,
                            y: -2
                        },
                        title: {
                            text: ''
                        }
                    }
                }
            }]
        }
    });
    function setSize(width) {
        chart.setSize(width, 300);
    }
</script>
</body>
</html>