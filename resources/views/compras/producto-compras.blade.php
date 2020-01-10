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
                <h4 class="title">Selecciona tus productos de la compra.</h4>
            </div>
            <div class="content table-responsive">
                <div class="row">
                    <div class="col-md-9">
                        <table id="data" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">Producto</th>
                                <th class="text-center">Costo</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center">{{$product->nombre}}</td>
                                    <td class="text-center">${{number_format($product->costo,2,'.',',')}}</td>
                                    <td class="text-center">
                                        {{$product->existencia}}
                                    </td>
                                    <form action="{{asset('administrador/producto-compras')}}" method="post">
                                        <input type="hidden" name="producto_id" value="{{$product->id}}">
                                        <input type="hidden" name="compra_id" value="{{$compra->id}}">
                                        @csrf
                                        <td class="text-center">
                                            <input type="number" required class="form-control" name="cantidad">
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-success btn-xs" type="submit">Agregar</button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-3 text-center">
                        <h5 class="title">Productos agregados</h5>
                        <form action="{{asset('administrador/producto-compras/'.$compra->id)}}" method="post">
                            @csrf
                            {{method_field('put')}}
                            <button type="submit" class="btn btn-success btn-xs">Terminar compra</button>
                        </form>
                        <hr>
                        <ul class="list-group" style="height: 300px; overflow-y: scroll;">
                            @foreach($productsCompra as $productCompra)
                                <li class="list-group-item">
                                    {{$productCompra->product->nombre}} <br>
                                    Cantidad: {{$productCompra->cantidad}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
