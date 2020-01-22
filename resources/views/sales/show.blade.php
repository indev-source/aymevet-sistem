@extends('layouts.dashboard.dashboard')
@section('title','Detalle de ventas')
@section('content')
	<div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
		<div class="card">
			<div class="header">
				<h4 class="title text-uppercase">Datos de la venta</h4>
			</div>
			<div class="content">
				<ul class="list-group">
					<li class="list-group-item">
						<strong>Total: </strong>${{number_format($sale->total,2,',','.')}}
					</li>
					<li class="list-group-item">
						<strong>Cliente: </strong>{{$sale->customer->nombre_completo}}
					</li>
					<li class="list-group-item">
						<strong>Fecha: </strong>{{$sale->created_at}}
					</li>
					<li class="list-group-item">
						<strong>Estatus: </strong>{{$sale->estatus}}
					</li>
					<li class="list-group-item">
						<strong>Vendedor: </strong>{{$sale->seller->name}}
					</li>
				</ul>
				<form action="{{asset('administrador/ventas/'.$sale->id)}}" method="post" style="display: inline-block;">
					@csrf
					{{method_field('delete')}}
					<button @if(Auth::user()->rol != 'administrador') disabled @endif type="submit" class="btn btn-xs btn-danger">Cancelar venta</button>
				</form>
				<a href="" class="btn btn-xs btn-primary">Reimprimir ticket</a>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<div class="title uppercase">
					<h4 class="title text-uppercase">Productos de la venta</h4>
				</div>
			</div>
			<div class="content">
				<ul class="list-group">
					@foreach($products as $product)
						<li class="list-group-item">
							<strong>Producto: </strong>{{$product->nombre}} <br>
							<strong>Cantidad: </strong>{{$product->cantidad}} <br>
							<strong>Precio: </strong> ${{number_format($product->precio,2,'.',',')}}
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@stop 