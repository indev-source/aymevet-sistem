@extends('layouts.dashboard.dashboard')
@section('title','Traspasos')
@section('content')
<div class="col-md-12">
    <div class="card">
		<div class="header flex">
			<h4 class="title text-uppercase">Listado de traspasos | <a href="/administrador/traspasos/create">Agregar nuevo</a></h4>
			<form action="{{asset('traspasos')}}" class="flex padding-form">
				<select name="estatus" class="form-control margin-right-sml" id="">
					<option value="">Selecciona un estatus</option>
					<option value="autorizado">Autorizados</option>
					<option value="aceptado">Aceptados</option>
					<option value="enviado">Enviados</option>
					<option value="proceso">En proceso</option>
				</select>
				<button class="btn btn-primary">Filtrar</button>
			</form>
		</div> <hr>
		<div class="content table-responsive ">
			@include('traspasos.data')
		</div>
	</div>
</div>
@stop
