@extends('layouts.dashboard.dashboard')
@section('title','Empleados')
@section('content')
    <div class="col-md-12">
        @if (session('status_success'))
            <div class="alert alert-success">
                {!! session('status_success') !!}
            </div>
        @endif
        <div class="card">
            <div class="header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
                <h4 class="title">Vendedor: {{$seller->name}}, ventas del año: {{$year}}</h4>
            </div>
            <div class="content table-responsive">
                <form action="{{asset('reportes/ventas/vendedores/'.$seller->id)}}" method="get">
                    <div class="form-group">
                        <label for="date">Año: </label>
                        <input type="number" name="year" class="form-control" placeholder="Ingresa el año">
                    </div>
                </form>
                <ul class="list-group">
                    <?php $total = 0; ?>
                    <li class="list-group-item">
                        Enero:
                        @foreach($totalSellerByMonth  as $mes)
                            @if($mes->mes == 1)
                               <?php $total += $mes->total_ventas; ?>
                                <span style="color:green; font-weight: bold;"> ${{number_format($mes->total_ventas,2,'.',',')}}</span>
                            @endif
                        @endforeach
                    </li>
                    <li class="list-group-item">
                        Febrero:
                        @foreach($totalSellerByMonth  as $mes)
                            @if($mes->mes == 2)
                                <?php $total += $mes->total_ventas; ?>
                                <span style="color:green; font-weight: bold;"> ${{number_format($mes->total_ventas,2,'.',',')}}</span>
                            @endif
                        @endforeach
                    </li>
                    <li class="list-group-item">
                        Marzo:
                        @foreach($totalSellerByMonth  as $mes)
                            @if($mes->mes == 3)
                                <?php $total += $mes->total_ventas; ?>
                                <span style="color:green; font-weight: bold;"> ${{number_format($mes->total_ventas,2,'.',',')}}</span>
                            @endif
                        @endforeach
                    </li>
                    <li class="list-group-item">
                        Abril:
                        @foreach($totalSellerByMonth  as $mes)
                            @if($mes->mes == 4)
                                <?php $total += $mes->total_ventas; ?>
                                <span style="color:green; font-weight: bold;"> ${{number_format($mes->total_ventas,2,'.',',')}}</span>
                            @endif
                        @endforeach
                    </li>
                    <li class="list-group-item">
                        Mayo:
                        @foreach($totalSellerByMonth  as $mes)
                            @if($mes->mes == 5)
                                <?php $total += $mes->total_ventas; ?>
                                <span style="color:green; font-weight: bold;"> ${{number_format($mes->total_ventas,2,'.',',')}}</span>
                            @endif
                        @endforeach
                    </li>
                    <li class="list-group-item">
                        Junio:
                        @foreach($totalSellerByMonth  as $mes)
                            @if($mes->mes == 6)
                                <?php $total += $mes->total_ventas; ?>
                                <span style="color:green; font-weight: bold;"> ${{number_format($mes->total_ventas,2,'.',',')}}</span>
                            @endif
                        @endforeach

                    </li>
                    <li class="list-group-item">
                        Julio:
                        @foreach($totalSellerByMonth  as $mes)
                            @if($mes->mes == 7)
                                <?php $total += $mes->total_ventas; ?>
                                <span style="color:green; font-weight: bold;"> ${{number_format($mes->total_ventas,2,'.',',')}}</span>
                            @endif
                        @endforeach

                    </li>
                    <li class="list-group-item">
                        Agosto:
                        @foreach($totalSellerByMonth  as $mes)
                            @if($mes->mes == 8)
                                <?php $total += $mes->total_ventas; ?>
                                <span style="color:green; font-weight: bold;"> ${{number_format($mes->total_ventas,2,'.',',')}}</span>
                            @endif
                        @endforeach

                    </li>
                    <li class="list-group-item">
                        Septiembre:
                        @foreach($totalSellerByMonth  as $mes)
                            @if($mes->mes == 9)
                                <?php $total += $mes->total_ventas; ?>
                                <span style="color:green; font-weight: bold;"> ${{number_format($mes->total_ventas,2,'.',',')}}</span>
                            @endif
                        @endforeach

                    </li>
                    <li class="list-group-item">
                        Octubre:
                        @foreach($totalSellerByMonth  as $mes)
                            @if($mes->mes == 10)
                                <?php $total += $mes->total_ventas; ?>
                                <span style="color:green; font-weight: bold;"> ${{number_format($mes->total_ventas,2,'.',',')}}</span>
                            @endif
                        @endforeach

                    </li>
                    <li class="list-group-item">
                        Noviembre:
                        @foreach($totalSellerByMonth  as $mes)
                            @if($mes->mes == 11)
                                <?php $total += $mes->total_ventas; ?>
                                <span style="color:green; font-weight: bold;"> ${{number_format($mes->total_ventas,2,'.',',')}}</span>
                            @endif
                        @endforeach

                    </li>
                    <li class="list-group-item">
                        Diciembre:
                        @foreach($totalSellerByMonth  as $mes)
                            @if($mes->mes == 12)
                                <?php $total += $mes->total_ventas; ?>
                                <span style="color:green; font-weight: bold;"> ${{number_format($mes->total_ventas,2,'.',',')}}</span>
                            @endif
                        @endforeach
                    </li>
                    <li class="list-group-item">
                        <span style="color:green; font-weight: bold;">Ventas totales en el año {{$year}}: ${{number_format($total,2,'.',',')}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop

