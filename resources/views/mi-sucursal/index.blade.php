@extends('layouts.dashboard.dashboard')
@section('title','Mi ruta')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-12 colsm-12">
            <div class="card">
                <div class="header text-center">
                    <img src="{{asset('map.png')}}" class="img-round" alt="">
                </div>
                <div class="content">
                    <h4 class="text-center">Ruta: {{Auth::user()->bussine->nombre}}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-xs-12 colsm-12">
            <div class="card">
                <div class="header text-center">
                    <h4 class="title text-uppercase">Menu de opciones</h4>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                    <img src="{{asset('products.png')}}" class="img-round" alt="">
                                    <a href="{{asset('mi-sucursal/productos')}}" class="btn btn-sm btn-primary">Mis productos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                    <img src="{{asset('sales.png')}}" class="img-round" alt="">
                                    <a href="{{asset('mi-sucursal/ventas')}}" class="btn btn-sm btn-primary">Mis ventas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                    <img src="{{asset('customers.png')}}" class="img-round" alt="">
                                    <a href="{{asset('mi-sucursal/clientes')}}" class="btn btn-sm btn-primary">Mis clientes</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                    <img src="{{asset('transfer.png')}}" class="img-round" alt="">
                                    <a href="{{asset('mi-sucursal/traspasos')}}" class="btn btn-sm btn-primary">Mis traspasos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                    <img src="{{asset('devolucion.png')}}" class="img-round" alt="">
                                    <button class="btn btn-sm btn-primary">devoluciones</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <div class="card">
                                <div class="content">
                                    <img src="{{asset('report.png')}}" class="img-round" alt="">
                                    <button class="btn btn-sm btn-primary">Mis reportes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop