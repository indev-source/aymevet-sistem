@extends('layouts.dashboard.dashboard')
@section('title','Reportes')
@section('content')
    <div class="row">
        <div class="col-md-3 text-center">
            <div class="card">
                <div class="header">
                    <h6 class="title">Reporte de inventario</h6>
                </div>
                <div class="content">
                    <img style="width: 100%;" src="https://image.flaticon.com/icons/svg/29/29099.svg" alt="">
                    <hr>
                    <li class="dropdown" style="list-style: none !important; z-index: 1000 !important;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Ver Reportes
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/reportes/inventario/">
                                    Reporte general
                                </a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target=".bd-example-modal-lg-inventario">
                                    Reporte por sucursal
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Reporte por precios
                                </a>
                            </li>
                            <li>
                                <a href="reportes/inventario/top-10">
                                    Reporte top 10 mas vendidos
                                </a>
                            </li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="card">
                <div class="header">
                    <h6 class="title">Reporte de ventas</h6>
                </div>
                <div class="content">
                    <img style="width: 100%;" src="https://image.flaticon.com/icons/svg/29/29099.svg" alt="">
                    <hr>
                    <li class="dropdown" style="list-style: none !important; z-index: 1000 !important;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Ver Reportes
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/reportes/ventas/">
                                    Reporte general
                                </a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target=".bd-example-modal-lg-ventas">
                                    Reporte por sucursal
                                </a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target=".bd-example-modal-lg-fechav">
                                    Reporte por fechas
                                </a>
                            </li>
                            <li>
                                <a href="/reportes/ventas/vendedores">
                                   Reporte de vendedores
                                </a>
                            </li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </div>
@stop
<script>

</script>
