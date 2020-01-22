@extends('layouts.dashboard.dashboard')
@section('title','Vender')
@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				@if (session('stock_none'))
			        <div class="alert alert-danger">
			            {!! session('stock_none') !!}
			        </div>
			    @endif
				<div class="card" style="border:1px solid rgba(0,0,0,.4) !important;">
					<div class="content">
						<div class="footer">
							<div class="stats">
								<a data-toggle="modal" class="btn btn-info" data-target=".bs-example-modal-lg" style="cursor: pointer;">
									<i class="fa fa-cog" class="btn btn-primary" ></i> Consultar Inventario
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-sm-12">
				@include('sales.product-on-sale')
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<form action="{{asset('dashboard/venta/')}}" method="post">
		<div class="card" style="border:1px solid rgba(0,0,0,.4) !important;">
			<div class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="icon-big icon-success text-center">
							<p style="color:#243882; font-weight:900; font-size:17px;">Detalle de la venta</p> <hr>
							<select required="" name="tipo_venta" class="form-control" id="">
								<option value="">Selecciona el tipo de venta</option>
								<option value="contado">1.Contado</option>
								<option value="credito">2.Credito</option>
							</select>
							<hr>
							<select required="" name="cliente" class="form-control" id="">
								<option value="" selected>Selecciona un cliente</option>
								@foreach($customers as $cliente)
									<option value="{{$cliente->id}}">{{$cliente->nombre_completo}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="content">
							<div class="row">
								<div class="col-md-6">
									<span>Subtotal: </span>
								</div>
								<div class="col-md-6 text-right">${{number_format($total,2,'.',',')}}</div>
							</div><hr>
							<div class="row">
								<div class="col-md-6">
									<span>Descuento: </span>
								</div>
								<div class="col-md-6 text-right">${{number_format($sale->tdescuento,2,'.',',')}}</div>
							</div><hr>
							<div class="row">
								<div class="col-md-6">
									<span>P/Tarjeta: </span>
								</div>
								<div class="col-md-6 text-right">${{number_format(0,2,'.',',')}}</div>
							</div><hr>
							<div class="row">
								<div class="col-md-6">
									<span class="total strong-sale">Total: </span>
								</div>
								<div class="col-md-6 text-right total-number strong-sale">${{number_format($total,2,'.',',')}}</div>
							</div>
						</div>
						<div class="">
							<hr />
							<div class="">
								<button @if($total == 0 ) disabled @endif class="btn btn-success btn-sm form-control" style="width: 100% !important;"><i class="ti-calendar"></i> Terminar Venta</button>
							</div>
						</div> 
					</div>
					
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
@stop
