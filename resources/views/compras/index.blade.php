@extends('layouts.dashboard.dashboard')
@section('title','Compras')
@section('content')
    <div class="col-md-12">
        @if (session('status_success'))
            <div class="alert alert-success">
                {!! session('status_success') !!}
            </div>
        @endif
        <div class="card">
            <div class="header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
                <h4 class="title">Listado de compras.</h4>
                <p class="category">
                    <a class="btn btn-success btn-sm" href="{{asset('administrador/compras/create')}}">
                        Agregar compra
                    </a>
                </p>
            </div>
            <div class="content table-responsive">
                <table id="data" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">FOLIO</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Compra</th>
                            <th class="text-center">Fecha pago</th>
                            <th class="text-center">Dias para pagar</th>
                            <th class="text-center">Estus</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compras as $compra)
                            <tr>
                                <td>{{$compra->id}}</td>
                                <td>${{number_format($compra->total,2,'.',',')}}</td>
                                <td>
                                    {{$compra->tipo_compra}}
                                </td>
                                <td>
                                    @if($compra->estatus == 'pagado')
                                        <span class="{{$compra->estatus}}">pagada</span>
                                    @else
                                        <span class="{{$compra->estatus}}">{{$compra->fecha_pago}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($compra->estatus == 'pagado')
                                        <span class="{{$compra->estatus}}">pagada</span>
                                    @else
                                        <span class="{{$compra->estatus}}">{{$compra->dias_pago}} dia(s) restantes</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="{{$compra->estatus}}">{{$compra->estatus}}</span>
                                </td>
                                <td>
                                    <a href="" class="btn btn-success btn-xs">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
