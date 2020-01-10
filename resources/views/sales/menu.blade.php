@extends('layouts.dashboard.dashboard')
@section('title','Menu de ventas')
@section('content')
<div class="row">
	<div class="col-lg-3 col-sm-6">
		<div class="card">
			<div class="content">
				<div class="row">
					<div class="col-xs-5">
						<div class="icon-big icon-success text-center">
							<i class="fa fa-money"></i>
						</div>
					</div>
					<div class="col-xs-7">
						<div class="numbers">
							<p>Ventas de contado</p>
						</div>
					</div>
				</div>
				<a href="{{asset('administrador/ventas?tipo_venta=contado')}}" class="btn btn-success btn-xs"><span class="fa fa-arrow-right"></span> Ver las ventas</a>
			</div>
		</div>
	</div>
    <div class="col-lg-3 col-sm-6">
		<div class="card">
			<div class="content">
				<div class="row">
					<div class="col-xs-5">
						<div class="icon-big icon-success text-center">
							<i class="fa fa-money"></i>
						</div>
					</div>
					<div class="col-xs-7">
						<div class="numbers">
							<p>Ventas a credito</p>
						</div>
					</div>
				</div>
				<a href="{{asset('administrador/ventas?tipo_venta=credito')}}" class="btn btn-success btn-xs"><span class="fa fa-arrow-right"></span> Ver las ventas</a>
			</div>
		</div>
	</div>
    <div class="col-lg-3 col-sm-6">
		<div class="card">
			<div class="content">
				<div class="row">
					<div class="col-xs-5">
						<div class="icon-big icon-success text-center">
							<i class="fa fa-money"></i>
						</div>
					</div>
					<div class="col-xs-7">
						<div class="numbers">
							<p>Todas las ventas</p>
						</div>
					</div>
				</div>
				<a href="{{asset('administrador/ventas?tipo_venta=todo')}}" class="btn btn-success btn-xs"><span class="fa fa-arrow-right"></span> Ver las ventas</a>
			</div>
		</div>
	</div>
</div>
@stop