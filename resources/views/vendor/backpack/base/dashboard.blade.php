@extends('backpack::layout')

<!-- /*===== set custom javascript =====*/ -->
@section('style_javascript')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
    <!-- /*========================= 10 =========================*/ -->
    Highcharts.chart('container10', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'График посещения сайта (последнее 10 дней)'
        },
        xAxis: {
            categories: [
            @foreach($dailycountvisitorid10 as $key => $value)
            '{!! $key !!}',
            @endforeach
            ]
        },
        yAxis: {
            title: {
                text: 'Количество'
            },
            labels: {
                formatter: function () {
                    return this.value;
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
        series: [{
            name: 'Всего',
            marker: {
                symbol: 'square'
            },
            data: [
            @foreach($dailycountvisitorid10 as $key => $value)
            {!! $value !!},
            @endforeach
            ]}, {
                name: 'Уникальных',
                marker: {
                    symbol: 'diamond'
                },
                data: [
                @foreach($dailycountvisitorid10 as $key => $value)
                @if (!empty($dailycountvisitorip10[$key]) )
                {!! $dailycountvisitorip10[$key] !!},
                @else
                0,
                @endif
                @endforeach
                ]
            }
            ]
        });

    <!-- /*========================= 30 =========================*/ -->
    Highcharts.chart('container30', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'График посещения сайта (последнее 30 дней)'
        },
        xAxis: {
            categories: [
            @foreach($dailycountvisitorid30 as $key => $value)
            '{!! $key !!}',
            @endforeach
            ]
        },
        yAxis: {
            title: {
                text: 'Количество'
            },
            labels: {
                formatter: function () {
                    return this.value;
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
        series: [{
            name: 'Всего',
            marker: {
                symbol: 'square'
            },
            data: [
            @foreach($dailycountvisitorid30 as $key => $value)
            {!! $value !!},
            @endforeach
            ]}, {
                name: 'Уникальных',
                marker: {
                    symbol: 'diamond'
                },
                data: [
                @foreach($dailycountvisitorid30 as $key => $value)
                @if (!empty($dailycountvisitorip30[$key]) )
                {!! $dailycountvisitorip30[$key] !!},
                @else
                0,
                @endif
                @endforeach
                ]
            }
            ]
        });

    <!-- /*========================= 90 =========================*/ -->
    Highcharts.chart('container90', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'График посещения сайта (последнее 90 дней)'
        },
        xAxis: {
            categories: [
            @foreach($dailycountvisitorid90 as $key => $value)
            '{!! $key !!}',
            @endforeach
            ]
        },
        yAxis: {
            title: {
                text: 'Количество'
            },
            labels: {
                formatter: function () {
                    return this.value;
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
        series: [{
            name: 'Всего',
            marker: {
                symbol: 'square'
            },
            data: [
            @foreach($dailycountvisitorid90 as $key => $value)
            {!! $value !!},
            @endforeach
            ]}, {
                name: 'Уникальных',
                marker: {
                    symbol: 'diamond'
                },
                data: [
                @foreach($dailycountvisitorid90 as $key => $value)
                @if (!empty($dailycountvisitorip90[$key]) )
                {!! $dailycountvisitorip90[$key] !!},
                @else
                0,
                @endif
                @endforeach
                ]
            }
            ]
        });

    <!-- /*========================= 180 =========================*/ -->
    Highcharts.chart('container180', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'График посещения сайта (последнее 180 дней)'
        },
        xAxis: {
            categories: [
            @foreach($dailycountvisitorid180 as $key => $value)
            '{!! $key !!}',
            @endforeach
            ]
        },
        yAxis: {
            title: {
                text: 'Количество'
            },
            labels: {
                formatter: function () {
                    return this.value;
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
        series: [{
            name: 'Всего',
            marker: {
                symbol: 'square'
            },
            data: [
            @foreach($dailycountvisitorid180 as $key => $value)
            {!! $value !!},
            @endforeach
            ]}, {
                name: 'Уникальных',
                marker: {
                    symbol: 'diamond'
                },
                data: [
                @foreach($dailycountvisitorid180 as $key => $value)
                @if (!empty($dailycountvisitorip180[$key]) )
                {!! $dailycountvisitorip180[$key] !!},
                @else
                0,
                @endif
                @endforeach
                ]
            }
            ]
        });

    <!-- /*========================= browser =========================*/ -->
    Highcharts.chart('browser', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Браузеры'
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
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [
            @foreach($visitorid_browser as $key => $value)
            @if($value['browser'] == 'unknown')
            @else
            {
                name: '{{$value['browser']}}',
                y: {{ $value['value']}}
            },
            @endif
            @endforeach
            ]
        }]
    });

    <!-- /*========================= os =========================*/ -->
    Highcharts.chart('os', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'ОС'
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
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [
            @foreach($visitorid_os as $key => $value)
            @if($value['os'] == 'unknown')
            @else
            {
                name: '{{$value['os']}}',
                y: {{ $value['value']}}
            },
            @endif
            @endforeach
            ]
        }]
    });
</script>
@endsection

<style>
    .dropdown {
        position: relative;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        z-index: 999;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>

@section('header')
<section class="content-header">
    <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
    </ol>
</section>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="dropdown">
                            <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3>{{$visitorid_this_month}}</h3>
                                    <p>Поситителей (этот месяц)</p>
                                </div>
                                <div class="icon" style="top:0">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a class="small-box-footer">По входу на сайт</a>
                            </div>
                            <div class="dropdown-content">
                                <div class="small-box bg-teal">
                                    <div class="inner">
                                        <h3>{{$visitorid_last_month}}</h3>
                                        <p>прошлый месяц</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion"></i>
                                    </div>
                                </div>
                                <div class="small-box bg-teal">
                                    <div class="inner">
                                        <h3>{{$visitorid}}</h3>
                                        <p>всего</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <h3>{{$visitorip}}</h3>
                                <p>Уникальных поситителей (всего)</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a class="small-box-footer">По IP</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">10 дней</a></li>
                        <li><a data-toggle="tab" href="#menu1">30 дней</a></li>
                        <li><a data-toggle="tab" href="#menu2">90 дней</a></li>
                        <li><a data-toggle="tab" href="#menu3">180 дней</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="row">
                                <section class="col-lg-12 connectedSortable">
                                    <div id="container10" ></div>
                                </section>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="row">
                                <section class="col-lg-12 connectedSortable">
                                    <div id="container30" ></div>
                                </section>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="row">
                                <section class="col-lg-12 connectedSortable">
                                    <div id="container90" ></div>
                                </section>
                            </div>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <div class="row">
                                <section class="col-lg-12 connectedSortable">
                                    <div id="container180" ></div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div id="browser" ></div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div id="os" ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection