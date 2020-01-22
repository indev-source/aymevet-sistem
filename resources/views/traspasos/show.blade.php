@extends('layouts.dashboard.dashboard')
@section('title','Detalle de traspaso')
@section('content')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-uppercase">detalle del traspaso</h4>
				</div>
				<div class="content">
					<div class="row">
						<div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Sucursal: </strong>{{$traspaso->business->nombre}} |
                                    <strong>Vendedor: </strong>{{$traspaso->business->getEmailOfSeller($traspaso->business->id)->name}}
                                </li>
                                <li class="list-group-item">
                                    <strong>Fecha de envio: </strong>{{$traspaso->created_at}}
                                </li>
                                <li class="list-group-item">
                                    <strong>Usuario: </strong>{{$traspaso->user->name}}
                                </li>
                                <li class="list-group-item">
                                    <strong>Estatus: </strong><span class="text-uppercase label {{$traspaso->estatus == 'aceptado' ? 'label-danger' : 'label-success'}}">{{$traspaso->estatus}}</span>
                                    @if($traspaso->estatus == 'aceptado')
                                        <form action="{{asset('administrador/traspasos/autorizar/'.$traspaso->id)}}" style="display:inline-block;" method="POST">
                                            @csrf
                                            {{method_field('put')}}
                                            <button class="btn btn-primary btn-sm">Autorizar</button>
                                        </form>
                                    @endif
                                </li>
                                <li class="list-group-item">
                                   <a href="{{asset('reportes/traspaso/respaldo/'.$traspaso->id)}}" class="btn btn-primary btn-sm"><span class="fa fa-file"></span> Imprimir reporte</a>
                                </li>
                                <li class="list-group-item">
                                    <a  class="btn btn-primary btn-sm" onclick="sincronizar({{$traspaso->id}},'{{$traspaso->business->getEmailOfSeller($traspaso->business->id)->email}}');"><span class="fa fa-phone"></span> Sincronizar al celular</a>
                                </li>
                            </ul>
						</div>
						<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
							<h4 class="text-center text-uppercase">Productos agregados al traspaso</h4><hr>
							<ul class="list-group">
                                @foreach($products as $product)
                                    <li class="list-group-item">
                                        <strong>Producto: </strong>{{$product->nombre}} |
                                        <strong>Cantidad: </strong>{{$product->cantidad}}
                                    </li>
                                @endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
    <script src="https://www.gstatic.com/firebasejs/7.2.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.3/firebase-firestore.js"></script>
    <script src="{{asset('sincronizacion-js/sync.js')}}"></script>
@stop
