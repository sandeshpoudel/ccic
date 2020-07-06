@extends('wrapper')
@section('headerscripts')

    {{--commmon header script for this module and individual files for this page--}}
@stop
@section('title')
    Dashboard: Total Active Members as of today :{{ $members }}
@stop
    @section('content')

        @include('dashboard.search')
        <div class="hr hr32 hr-dotted"></div>
        @include('dashboard.membership')
        <div class="hr hr32 hr-dotted"></div>
        @include('dashboard.filter')
    @stop


@section('footerscripts')
{{--    <script src="{{ asset('components/_mod/jquery-ui.custom/jquery-ui.custom.js')}}"></script>--}}
{{--    <script src="{{ asset('components/jqueryui-touch-punch/jquery.ui.touch-punch.js')}}"></script>--}}
    <script src="{{ asset('components/_mod/easypiechart/jquery.easypiechart.js')}}"></script>
{{--    <script src="{{ asset('components/jquery.sparkline/index.js')}}"></script>--}}
    <script src="{{ asset('components/Flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('components/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('components/Flot/jquery.flot.resize.js')}}"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $('.easy-pie-chart.percentage').each(function(){
                var $box = $(this).closest('.infobox');
                var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
                var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
                var size = parseInt($(this).data('size')) || 50;
                $(this).easyPieChart({
                    barColor: barColor,
                    trackColor: trackColor,
                    scaleColor: false,
                    lineCap: 'butt',
                    lineWidth: parseInt(size/10),
                    animate: ace.vars['old_ie'] ? false : 1000,
                    size: size
                });
            })




            //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
            //but sometimes it brings up errors with normal resize event handlers
            $.resize.throttleWindow = false;

            var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
            var data = [

                    @foreach($ownershiptypes as $ownershiptype)
                { {!!'label: "'.$ownershiptype->name.'",  data: '.$ownershiptype->member_count*100/$members .''!!} },
                @endforeach
            ]
            function drawPieChart(placeholder, data, position) {
                $.plot(placeholder, data, {
                    series: {
                        pie: {
                            show: true,
                            tilt:0.8,
                            highlight: {
                                opacity: 0.25
                            },
                            stroke: {
                                color: '#fff',
                                width: 2
                            },
                            startAngle: 2
                        }
                    },
                    legend: {
                        show: true,
                        position: position || "ne",
                        labelBoxBorderColor: null,
                        margin:[-30,15]
                    }
                    ,
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                })
            }
            drawPieChart(placeholder, data);

            /**
             we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
             so that's not needed actually.
             */
            placeholder.data('chart', data);
            placeholder.data('draw', drawPieChart);


            //pie chart tooltip example
            var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
            var previousPoint = null;

            placeholder.on('plothover', function (event, pos, item) {
                if(item) {
                    if (previousPoint != item.seriesIndex) {
                        previousPoint = item.seriesIndex;
                        var tip = item.series['label'] + " : " + item.series['percent']+'%';
                        $tooltip.show().children(0).text(tip);
                    }
                    $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
                } else {
                    $tooltip.hide();
                    previousPoint = null;
                }

            });

            /////////////////////////////////////
            $(document).one('ajaxloadstart.page', function(e) {
                $tooltip.remove();
            });




            var d1 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                d1.push([i, Math.sin(i)]);
            }

            var d2 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                d2.push([i, Math.cos(i)]);
            }

            var d3 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.2) {
                d3.push([i, Math.tan(i)]);
            }







        })
    </script>
@stop