@extends('layouts.dashboard.dashboard')
@section('title','Servicios')
@section('content')
@if (session('status_success'))
<div class="alert alert-success">
	{!! session('status_success') !!}
</div>
@endif
<div class="col-md-12">
	@include('sales.data-products')
</div>
<div class="col-md-12">
	<div class="card">
		<div class="header" style="display: flex; align-items: center; justify-content: space-between;">
			<h3 class="title">Detalle del servicio, FOLIO: {{$servicio->id}}, FECHA: {{$sale->date}}</h3>
			<a href="{{asset('reportes/servicios/'.$servicio->id)}}" class="btn btn-success btn-sm">Exportar PDF</a>
		</div><hr>
		<div class="content">
			<div class="form-group">
				<label for="">Nombre del cliente</label>
				<input required="Ingresa el campo" disabled="" value="{{$servicio->nombre_cliente}}" type="text" name="nombre_cliente" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Dirección</label>
				<input required="Ingresa el campo" value="{{$servicio->direccion}}" disabled="" type="text" name="direccion" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Teléfono</label>
				<input required="Ingresa el campo " value="{{$servicio->telefono}}" disabled="" type="text" name="telefono" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Modelo de la italika</label>
				<input required="Ingresa el campo " type="text" value="{{$servicio->modelo_italika}}" disabled="" name="modelo_italika" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Numero de serie</label>
				<input required="Ingresa el campo " type="text" value="{{$servicio->numero_serie}}" disabled="" name="numero_serie" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Cuenta con garantía activa</label>
				<select required="Ingresa el campo " disabled="" name="garantia" class="form-control" id="">
					<option>{{$servicio->garantia}}</option>
					
				</select>
			</div>
			<div class="form-group">
				<label for="">Kilometraje</label>
				<input required="Ingresa el campo " value="{{$servicio->kilometraje}}" disabled="" type="text" name="kilometraje" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Orden del servicio</label>
				<input required="Ingresa el campo " value="{{$servicio->orden_servicio}}" disabled="" type="text" name="orden_servicio" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Tipo de servicios</label>
				<select required="Ingresa el campo "  disabled="" class="form-control" name="tipo_servicio" id="">
					<option value="">{{$servicio->numero_serie}}</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Comentarios del cliente</label>
				<textarea required="Ingresa el campo " disabled=""  name="comentarios" class="form-control" id="" cols="30" rows="10">{{$servicio->comentarios}}
				</textarea>
			</div>
			<div class="form-group">
				<label for="">Sin daños</label>
				<select required="Ingresa el campo" disabled="" name="sin_danios" class="form-control" id="">
					<option value="si">{{$servicio->sin_danios}}</option>
					
				</select>
			</div>
			<div class="form-group">
				<label for="">Sin odómetro</label>
				<select name="sin_odometraje" disabled="" class="form-control" id="">
					<option value="{{$servicio->sin_odometraje}}">{{$servicio->sin_odometraje}}</option>
					
				</select>
			</div>

			<div class="form-group">
				<label for="">Precio de mano de obra</label>
				<input required="Ingresa el campo " value="${{number_format($servicio->precio_mano_obre,2,'.',',')}}" disabled="" type="text" name="precio_mano_obre" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Precio de los consumibles(Venta)</label>
				<input required="Ingresa el campo " value="${{number_format($servicio->precio_consumible,2,'.',',')}}" disabled="" type="text" name="precio_consumible" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Total</label>
				<input required="Ingresa el campo " value="${{number_format($servicio->total,2,'.',',')}}" type="text" disabled="" name="total" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Fecha de entrega</label>
				<input required="Ingresa el campo " value="{{$servicio->fecha_entrega}}" disabled="" type="date" name="fecha_entrega" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Telefono del CESIT</label>
				<input required="Ingresa el campo " value="{{$servicio->telefono_cecit}}" disabled="" type="text" name="telefono_cecit" class="form-control">
			</div>
		</div>
	</div>
</div>
@stop