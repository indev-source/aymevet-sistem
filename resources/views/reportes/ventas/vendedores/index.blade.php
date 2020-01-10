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
                <h4 class="title">Vendedores registrados con ventas.</h4>
            </div>
            <div class="content table-responsive">
                <table id="data" class="table table-striped">
                    <thead>
                    <th class="text-center">Ventas registradas</th>
                    <th class="text-center">Vendedor</th>
                    <th class="text-center">Total ventas</th>
                    <th class="text-center">Detalle</th>
                    </thead>
                    <tbody>
                    @foreach($sales_seller as $user)
                        <tr>
                            <td class="text-center">{{$user->top}}</td>
                            <td class="text-center">{{$user->name}}</td>
                            <td class="text-center">${{number_format($user->totalVentas,2,'.',',')}}</td>
                            <td class="text-center">
                                <a href="{{asset('reportes/ventas/vendedores/'.$user->seller_id.'?year='.$year)}}" class="btn btn-success btn-xs">
                                    Detalle
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop
