@extends('layouts.dashboard.dashboard')
@section('content')
    <div class="col-md-12">
        @if($traspaso->estatus == 'autorizado')
            <div class="alert alert-success">
                <strong>Este traspasos ya fue autorizado</strong>
            </div>
        @endif
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
        @if(Auth::user()->bussine_id == $traspaso->envia and $traspaso->estatus == 'enviado')
            <div class="alert alert-warning">Traspasos <span class="{{$traspaso->estatus}}">{{$traspaso->estatus}}</span>, esperando a que la sucursal {{$traspaso->srecibe->nombre}} reciba los productos</div>
        @endif
    </div>
	<div class="col-md-12">
		<div class="card">
			<div class="content">
                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>Envia: </strong>{{$traspaso->senvia->nombre}}
                    </li>
                    <li class="list-group-item">
                        <strong>Recibe: </strong>{{$traspaso->srecibe->nombre}}
                    </li>
                    <li class="list-group-item">
                        <strong>Usuario: </strong>{{$traspaso->usuario->name}}
                    </li>
                    <li class="list-group-item">
                        <strong>Fecha: </strong>{{$traspaso->created_at}}
                    </li>
                </ul>
                <!--AUTORIZAR TRASPASO SOLO SI ERES ADMINISTRADOR-->
                @if(Auth::user()->rol == 'administrador' and $traspaso->estatus == 'aceptado' and $traspaso->envia == Auth::user()->bussine_id)
                    <form action="{{asset('dashboard/v/admin/autorizar/traspaso/'.$traspaso->id)}}" method="post" class="text-center">
                        @csrf
                        {{method_field('put')}}
                        <button type="submit" class="btn btn-danger">Autorizar</button>
                    </form>
                @endif
                <!--ACEPTAR TRASPASO SOLO SI ERES ADMINISTRADOR-->
                @if(Auth::user()->rol == 'administrador' and $traspaso->estatus == 'enviado' and $traspaso->recibe == Auth::user()->bussine_id)
                    <form action="{{asset('dashboard/aceptar/traspaso/'.$traspaso->id)}}" method="post"  class="text-center">
                        @csrf
                        {{method_field('put')}}
                        <button type="submit" class="btn btn-danger">Aceptar traspaso de productos</button>
                    </form>
                @endif
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4 class="title">Detalle de traspaso</h4>
				<a href="{{asset('dashboard/v/admin/reporte/traspaso/'.$traspaso->id)}}" class="btn btn-xs btn-info">Imprimir hoja  de reporte</a>  Productos en el traspaso
			</div><hr>
			<div class="content">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<th class="text-center">Producto</th>
							<th class="text-center">Cantidad</th>
							<th class="text-center">Costo</th>
							<th class="text-center">Venta</th>
							<th class="text-center">Clave producto</th>
							<th class="text-center">Codigo</th>
							<th class="text-center">Codigo unidad</th>
						</thead>
						<tbody>
							@foreach($products as $product)
								<tr>
									<td class="text-center">{{$product->product->nombre}}</td>
									<td class="text-center">{{$product->cantidad}}</td>
									<td class="text-center">${{$product->product->costo}}</td>
									<td class="text-center">${{$product->product->precio1}}</td>
									<td class="text-center">{{$product->product->clave_producto}}</td>
									<td class="text-center"></td>
									<td class="text-center">{{$product->product->clave_unidad}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop
