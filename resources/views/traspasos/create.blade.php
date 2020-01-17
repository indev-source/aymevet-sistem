@extends('layouts.dashboard.dashboard')
@section('title','Registro de traspasos')
@section('content')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h4 class="title text-uppercase">configuración de traspasos</h4>
				</div>
				<div class="content">
					<div class="row">
						<div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
							<table id="data" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="text-center">Producto</th>
										<th class="text-center">Existencia</th>
										<th class="text-center">Cantidad</th>
										<th class="text-center">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
										<tr>
											<td class="text-center">{{$product->nombre}}</td>
											<td class="text-center">{{$product->existencia}}</td>
											<td class="text-center">
												<input type="text" class="form-control" name="cantidad" placeholder="Cantidad a traspasar">
											</td>
											<td class="text-center">
												<button class="btn btn-primary"><span class="fa fa-plus"></span> Agregar</button>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
							<h4 class="text-center text-uppercase">Productos agregados al traspaso</h4>
							<hr>
							<ul class="list-group">
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
