@extends('layouts.dashboard.dashboard')
@section('title','Traspasos')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Menu de traspasos</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h5 class="title">
                                    Nuevo Traspaso
                                </h5>
                            </div>
                            <div class="content">
                                <a href="/seleccionar-sucursales" class="btn btn-success">Seleccionar Sucursal</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h5 class="title">
                                    Traspasos Realizados
                                </h5>
                            </div>
                            <div class="content">
                                <a href="/traspasos-realizados" class="btn btn-success">Ver traspasos</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h5 class="title">
                                    Traspasos Recibidos
                                </h5>
                            </div>
                            <div class="content">
                                <a href="/traspasos-recibidos" class="btn btn-success">Ver traspasos</a>
                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->rol == 'administrador')
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h5 class="title">
                                    Traspasos autorizados
                                </h5>
                            </div>
                            <div class="content">
                                <a href="/traspasos-autorizados" class="btn btn-success">Ver traspasos</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
