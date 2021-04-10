<!DOCTYPE HTML>
<html>
@include('_header')
<body>
@include('_nav')


@include('_exam_select')

<div id="container" style="min-width:400px;height:400px"></div>
<script>
    var chart = Highcharts.chart('container', {
        chart: {
            spacing : [40, 0 , 40, 0]
        },
        title: {
            floating:true,
            text: '{{$title}}'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                point: {
                    events: {
                        mouseOver: function(e) {  // 鼠标滑过时动态更新标题
                            // 标题更新函数，API 地址：https://api.hcharts.cn/highcharts#Chart.setTitle
                            chart.setTitle({
                                text: e.target.name+ '\t'+ e.target.y + ' %'
                            });
                        }
                        //,
                        // click: function(e) { // 同样的可以在点击事件里处理
                        //     chart.setTitle({
                        //         text: e.point.name+ '\t'+ e.point.y + ' %'
                        //     });
                        // }
                    }
                },
            }
        },
        series: [{
            type: 'pie',
            innerSize: '80%',
            name: '市场份额',
            data: <?php echo $data?>
            // [
            //     {name:'Firefox',   y: 45.0, url : 'http://bbs.hcharts.cn'},
            //     ['IE',       26.8],
            //     {
            //         name: 'Chrome',
            //         y: 12.8,
            //         sliced: true,
            //         selected: true,
            //         url: 'http://www.hcharts.cn'
            //     },
            //     ['Safari',    8.5],
            //     ['Opera',     6.2],
            //     ['其他',   0.7]
            // ]
            //     [["IE",26.8],["Safari",8.5],["Opera",6.2],["其他",0.7]]

        }]
    }, function(c) { // 图表初始化完毕后的会掉函数
        // 环形图圆心
        var centerY = c.series[0].center[1],
            titleHeight = parseInt(c.title.styles.fontSize);
        // 动态设置标题位置
        c.setTitle({
            y:centerY + titleHeight/2
        });
    });
</script>
</body>
</html>