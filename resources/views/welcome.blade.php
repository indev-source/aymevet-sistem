@extends('layouts.dashboard.dashboard')
@section('title','Inicio')
@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h4 class="title text-uppercase">Grafica de ventas</h4>
                </div>
                <div class="content">
                    <div id="curve_chart" style="width: 100%; height: 500px"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h4 class="title text-uppercase">Menu de opciones</h4>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                    <img src="{{asset('products.png')}}" class="img-round" alt="">
                                    <a href="{{asset('administrador/productos')}}" class="btn btn-sm btn-primary">Productos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                    <img src="{{asset('sales.png')}}" class="img-round" alt="">
                                    <a href="{{asset('administrador/ventas')}}" class="btn btn-sm btn-primary">Ventas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                    <img src="{{asset('customers.png')}}" class="img-round" alt="">
                                    <a href="{{asset('administrador/clientes')}}" class="btn btn-sm btn-primary">Clientes</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                    <img src="{{asset('transfer.png')}}" class="img-round" alt="">
                                    <a href="{{asset('/administrador/traspasos')}}" class="btn btn-sm btn-primary">Traspasos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                    <img src="{{asset('devolucion.png')}}" class="img-round" alt="">
                                    <button class="btn btn-sm btn-primary">devoluciones</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                    <img src="{{asset('report.png')}}" class="img-round" alt="">
                                    <a href="{{asset('reportes')}}" class="btn btn-sm btn-primary">Mis reportes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                <strong>Ganancias del día: </strong> <span class="color-green">${{number_format($gananciasHoy,2,',','.')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                    <strong>Ganancias totales: </strong> <span class="color-green">${{number_format($ganancias,2,',','.')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Mes', 'Ventas'],
                @foreach($sales as $sale)
                    ['{{$sale->fecha}}',  {{$sale->total}}],
                @endforeach
            ]);

            var options = {
            title: 'Desempeño general del negocio',
            curveType: 'function',
            legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
@stop