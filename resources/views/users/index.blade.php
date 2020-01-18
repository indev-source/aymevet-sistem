@extends('layouts.dashboard.dashboard')
@section('title','Empleados')
@section('content')
<div class="col-md-12">
	
	@include('alerts.alert-success')
	<div class="card">
		<div class="header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
			<h4 class="title">Listado de usuario activos.</h4>
			<p class="category">
				<a class="btn btn-primary btn-sm" href="{{asset('administrador/usuarios/create')}}">
					Agregar usuario
				</a>
			</p>
		</div>
		<div class="content table-responsive">
			@include('users.data')
		</div>
	</div>
</div>
@stop
