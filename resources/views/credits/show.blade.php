@extends('layouts.dashboard.dashboard')
@section('title','Detalle del credito')
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-xs-12 col-xs-12">
                    <div class="card">
                        <div class="card-content">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Fecha del credito: </strong> {{$credit->created_at->format('Y-m-d')}} <br>
                                </li>
                                <li class="list-group-item">
                                    <strong>Estatus: </strong> <span class="label {{$credit->estatus == 'adeudo' ? 'label-danger' : 'label-success'}}">
                                        {{$credit->estatus}}
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <strong>Total: </strong> ${{number_format($total,2,',','.')}} <br>
                                </li>
                                <li class="list-group-item">
                                    <strong>Vendedor: </strong> {{$sale->seller->name}} <br>
                                </li>
                                <li class="list-group-item">
                                    <strong>Ruta: </strong> {{$sale->business->nombre}} <br>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12" style="height: 200px; overflow-y: scroll;">
                    <ul class="list-group" >
                        @foreach($products as $product)
                            <li class="list-group-item">
                                <strong>Producto: </strong> <a href="{{asset('')}}">{{$product->nombre}}</a> <br>
                                <strong>Cantidad: </strong>{{$product->cantidad}} <br>
                                <strong>Precio: </strong>{{$product->precio}} <br>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-lg 8 col-xs-12 col-sm-12">
                    @if (session('status_success'))
                        <div class="alert alert-success">
                            {!! session('status_success') !!}
                        </div>
                    @endif
                    @if (session('status_warning'))
                        <div class="alert alert-warning">
                            {!! session('status_warning') !!}
                        </div>
                    @endif
                    <div class="card">
                        <div class="header">
                            <h5>Historial de pagos</h5>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                                    <ul class="list-group">
                                        @foreach($pays as $pay)
                                            <li class="list-group-item">
                                                <strong>Pago: </strong> ${{number_format($pay->pago,2,',','.')}}<br>
                                                <strong>Fecha: </strong>{{$pay->created_at}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-4 col-xs-12 col-lg-4 col-sm-12">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <strong>Deuda total: </strong> <span style="color:indianred">${{number_format($total,2,',','.')}}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Pagado: </strong> <span style="color:seagreen;">${{number_format($payed,2,',','.')}}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Restante: </strong> <span style="color: brown;">${{number_format($toPay,2,',','.')}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
               <div class="col-md-4 col-xs-12 col-lg-4 col-sm-12">
                   <div class="card">
                       <div class="header">
                           <h5 class="">Recibir pago</h5>
                       </div>
                       <div class="content">
                           <form action="{{asset('pagos')}}" method="post">
                               @csrf
                               <input type="hidden" name="venta" value="{{$sale->id}}">
                               <input type="hidden" name="credito" value="{{$credit->id}}">
                               <input type="hidden" name="cliente" value="{{$sale->cliente}}">
                               <div class="form-group">
                                   <input  @if($credit->estatus == 'pagado') disabled @endif type="number" step="any" min="1" class="form-control" name="pago" placeholder="Ingresa la cantidad">
                               </div>
                               <button @if($credit->estatus == 'pagado') disabled @endif type="submit" class="btn btn-success form-control">Agregar</button>
                           </form>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
@stop
