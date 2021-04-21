@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-1">
                        <i class="pe-7s-cash"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">25034</span>mt</div>
                            <div class="stat-heading">Vendas do Mes em Curso</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-2">
                        <i class="pe-7s-cart"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">12000</span></div>
                            <div class="stat-heading">Despesas do Mes. curso</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-3">
                        <i class="pe-7s-browser"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">900</span></div>
                            <div class="stat-heading">Valores Pendentes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-4">
                        <i class="pe-7s-users"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">2</span></div>
                            <div class="stat-heading">Clientes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Vendas </h4>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card-body">
                        <!-- <canvas id="TrafficChart"></canvas>   -->
                        <div id="traffic-chart" class="traffic-chart"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-body">
                        <div class="progress-box progress-1">
                            <h4 class="por-title">Uma semana Atras</h4>
                            <div class="por-txt">Produtos (9%)</div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 9%;" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-box progress-2">
                            <h4 class="por-title">Esta Semana</h4>
                            <div class="por-txt">Produtos (5,5%)</div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 5.5%;" aria-valuenow="5,5" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-box progress-2">
                            <h4 class="por-title">Uma semana Atras</h4>
                            <div class="por-txt">Serviços (2%)</div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 2%;" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-box progress-2">
                            <h4 class="por-title">Esta semana </h4>
                            <div class="por-txt">Serviços (25%)</div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div> <!-- /.card-body -->
                </div>
            </div> <!-- /.row -->
            <div class="card-body"></div>
        </div>
    </div>
    <!-- /# column -->
</div>
<div class="orders">
    <div class="row">
        
        <div class="col-xl-12">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="card br-0">
                        <div class="card-body">
                            <div class="chart-container ov-h">
                                <div id="flotPie1" class="float-chart"></div>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>

                <div class="col-lg-6 col-xl-6">
                    <div class="card bg-flat-color-3  ">
                        <div class="card-body">
                            <h4 class="card-title m-0  white-color ">Rankig 2021</h4>
                        </div>
                         <div class="card-body">
                             <div id="flotLine5" class="flot-line"></div>
                         </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.col-md-4 -->
    </div>
</div>
<!-- /.orders -->
@endsection



@push('js')


<script>

jQuery(document).ready(function($) {
    "use strict";

    // Pie chart flotPie1
    var piedata = [
        { label: "Serviços", data: [[1,32]], color: '#5c6bc0'},
        { label: "Produtos", data: [[1,33]], color: '#66bb6a'},
        { label: "Despesas", data: [[1,35]], color: '#ef5350'}
    ];

    $.plot('#flotPie1', piedata, {
        series: {
            pie: {
                show: true,
                radius: 1,
                innerRadius: 0.65,
                label: {
                    show: true,
                    radius: 2/3,
                    threshold: 1
                },
                stroke: {
                    width: 0
                }
            }
        },
        grid: {
            hoverable: true,
            clickable: true
        }
    });
    // Pie chart flotPie1  End
    
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [80000, 120000, 13000,  0,  0,  0],
                  [1400, 12000, 3000,  0,  0,  0],
                  [14000, 36000, 13000,  0,  0,  0]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: true,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End

});
</script>

@endpush