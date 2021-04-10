<!DOCTYPE HTML>
<html>
@include('_header')
<body>
@include('_nav')
<div id="container" style="min-width:400px;height:400px"></div>
<script>
    var chart = Highcharts.chart('container', {
        chart: {
            type: 'spline'
        },
        title: {
            text: '班级总分排行'
        },
        // subtitle: {
        //     text: '数据来源: WorldClimate.com'
        // },
        xAxis: {
            categories: <?php echo $exam_name_json; ?>
        },
        yAxis: {
            title: {
                text: '总分'
            },
            labels: {
                formatter: function () {
                    return this.value + '°';
                }
            }
        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#666666',
                    lineWidth: 1
                }
            }
        },
        series: [
            @foreach($list as $item)
{{--                @foreach($item['score'] as $class)--}}
                {
                    name: ["{{$item['class_name']}}"],
                    marker: {
                        symbol: 'square'
                    },
                    // data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 23.3, 18.3, 13.9, 9.6]
                    data: [{{implode(',',$item['score'])}}]
                },
{{--            @endforeach--}}
            @endforeach
        ]
    });
</script>
</body>
</html>
