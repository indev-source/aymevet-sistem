@extends('layouts.dashboard.dashboard')
@section('title','Agrega nuevo traspaso')
@section('content')
<div class="row">
	<div class="col-md-12">
		<ul class="list-group">
			<li class="list-group-item"><strong>Sucursal que recibe: </strong> {{$traspaso->srecibe->nombre}}</li>
			<li class="list-group-item"><strong>Fecha: </strong> {{$traspaso->created_at}}</li>
			<li class="list-group-item"><strong>Usuario: </strong> {{$traspaso->usuario->name}}</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4 class="title">Selecciona los productos que vas a traspasar</h4>
			</div>
			<div class="content table-responsive table-full-width">
				<div class="content table-responsive">
					<table id="data" class="table">
						<thead>
							<th class="text-center">Producto</th>
							<th class="text-center">Existencia</th>
							<th class="text-center">Costo</th>
							<th class="text-center">precio</th>
							<th class="text-center">Cantidad</th>
							<th class="text-center">Acciones</th>
						</thead>
						<tbody>
							@foreach($products as $product)
								<tr>
									<td class="text-center">{{$product->nombre}}</td>
									<td class="text-center">{{$product->existencia}}</td>
									<td class="text-center">${{number_format($product->costo,2,'.',',')}}</td>
									<td class="text-center">${{number_format($product->precio1,2,'.',',')}}</td>
									<form action="{{asset('dashboard/agregar-producto-traspaso')}}" method="post">
										@csrf
										<input type="hidden" value="{{$product->id}}" name="producto_id">
										<input type="hidden" value="{{$traspaso->id}}" name="traspaso_id">
										<td class="text-center">
											<input class="form-control" type="number" required="" max="{{$product->existencia}}" name="cantidad" placeholder="Cantidad a traspasar">
										</td>
										<td class="text-center">
											<button type="submit" class="btn btn-success">Agregar</button>
										</td>
									</form>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="alert alert-success">
			<strong>Productos a traspasar</strong>
		</div>
		@if(count($productsTraspaso) != 0)
			<form action="{{asset('dashboard/traspaso/terminar')}}" method="post" class="text-center">
				@csrf
				<input type="hidden" value="{{$traspaso->id}}" name="traspaso_id">
				<button type="submit" class="btn btn-success ">Terminar Traspaso</button>
			</form> <hr>
			<ul class="list-group">
				@foreach($productsTraspaso as $productTraspaso)
					<li class="list-group-item"><strong>Producto: </strong> {{$productTraspaso->product->nombre}}</li>
					<li class="list-group-item"><strong>Cantidad: </strong> {{$productTraspaso->cantidad}}</li>
				@endforeach
			</ul>
		@else
			<h4 class="titel text-center">Sin productos agregados</h4>
		@endif

	</div>
</div>

@stop
