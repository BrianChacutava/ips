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
                            <div class="stat-text"><span class="count">3</span>mt</div>
                            <div class="stat-heading">Vendas Mensais</div>
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
                            <div class="stat-text"><span class="count">3</span></div>
                            <div class="stat-heading">Vendas Anuais</div>
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
                            <div class="stat-text"><span class="count">10</span></div>
                            <div class="stat-heading">Vendas em Curso</div>
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
                            <div class="stat-heading">Clients</div>
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
                <h4 class="box-title">Traffic </h4>
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
                            <div class="por-txt">1 cliente (0,1%)</div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-box progress-2">
                            <h4 class="por-title">Esta Semana</h4>
                            <div class="por-txt">2 clientes (0,75%)</div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 24%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-box progress-2">
                            <h4 class="por-title">Futuro</h4>
                            <div class="por-txt">1 clientes (0%)</div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="progress-box progress-2">
                            <h4 class="por-title">Targeted</h4>
                            <div class="por-txt">99 Clientes (90%)</div>
                            <div class="progress mb-2" style="height: 5px;">
                                <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
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
        
        <div class="col-xl-4">
            <div class="row">
                <div class="col-lg-6 col-xl-12">
                    <div class="card br-0">
                        <div class="card-body">
                            <div class="chart-container ov-h">
                                <div id="flotPie1" class="float-chart"></div>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>

                <div class="col-lg-6 col-xl-12">
                    <div class="card bg-flat-color-3  ">
                        <div class="card-body">
                            <h4 class="card-title m-0  white-color ">Vendas Janeiro 2021</h4>
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
