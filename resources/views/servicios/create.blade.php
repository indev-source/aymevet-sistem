@extends('layouts.dashboard.dashboard')
@section('title','Servicios')
@section('content')
<form action="{{asset('servicios')}}" method="post">
	@csrf
	<input type="hidden" name="venta_id" value="{{$venta->id}}">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">Nuevo servicio</div>
				<div class="content">
					<div class="alert alert-info">
						<span style="color:#333; font-size:16px; font-weight:bold;">PASO 1: SALUDA, DA TU NOMBRE Y EL NúMERO DE TU CESIT</span>
					</div>
					<p>Bienvenido al centro de servicios <strong>ITALIKA</strong></p>
					<div class="alert alert-info">
						<span style="color:#333; font-size:16px; font-weight:bold;">PASO 2: ESCRIBE LOS DATOS DEL CLIENTE Y DE LA ITALIKA</span>
					</div>
					<div class="form-group">
						<label for="">Nombre del cliente</label>
						<input required="Ingresa el campo " type="text" name="nombre_cliente" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Dirección</label>
						<input required="Ingresa el campo " type="text" name="direccion" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Teléfono</label>
						<input required="Ingresa el campo " type="text" name="telefono" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Modelo de la italika</label>
						<input required="Ingresa el campo " type="text" name="modelo_italika" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Numero de serie</label>
						<input required="Ingresa el campo " type="text" name="numero_serie" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Cuenta con garantía activa</label>
						<select required="Ingresa el campo " name="garantia" class="form-control" id="">
							<option value="si">Si</option>
							<option value="no">No</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Kilometraje</label>
						<input required="Ingresa el campo " type="text" name="kilometraje" class="form-control">
					</div>
					<div class="alert alert-info">
						<span style="color:#333; font-size:16px; font-weight:bold;">PASO 3: REVISA EL TRACKING</span>
					</div>
					<div class="form-group">
						<label for="">Orden del servicio</label>
						<input required="Ingresa el campo " type="text" name="orden_servicio" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Tipo de servicios</label>
						<select required="Ingresa el campo " class="form-control" name="tipo_servicio" id="">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="otros">Otros</option>
							<option value="garantias">Garantía</option>
						</select>
					</div>
					<div class="alert alert-info">
						<span style="color:#333; font-size:16px; font-weight:bold;">PASO 4: ESCUCHA LO QUE EL CLIENTE NECESITA</span>
					</div>
					<div class="form-group">
						<label for="">Comentarios del cliente</label>
						<textarea required="Ingresa el campo " name="comentarios" class="form-control" id="" cols="30" rows="10">
							
						</textarea>
					</div>
					<div class="alert alert-info">
						<span style="color:#333; font-size:16px; font-weight:bold;">PASO 5: HAS EL INVENTARIO DE LA ITALIKA ?</span>
					</div>

					<div class="alert alert-info">
						<span style="color:#333; font-size:16px; font-weight:bold;">PASO 6: MARCA EL NIVEL DEL COMBUSTIBLE</span>
					</div>
					<div class="form-group">
						<label for="">Sin daños</label>
						<select required="Ingresa el campo" name="sin_danios" class="form-control" id="">
							<option value="si">Si</option>
							<option value="no">No</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Sin odómetro</label>
						<select name="sin_odometraje" class="form-control" id="">
							<option value="si">Si</option>
							<option value="no">No</option>
						</select>
					</div>

					<div class="alert alert-info">
						<span style="color:#333; font-size:16px; font-weight:bold;">PASO 7: INDICA AL CLIENTE EL COSTO Y LA FECHA DE ENTREGA</span>
					</div>

					<div class="form-group">
						<label for="">Precio de mano de obra</label>
						<input required="Ingresa el campo " type="text" name="precio_mano_obre" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Precio de los consumibles(Venta)</label>
						<input required="Ingresa el campo " type="text" name="precio_consumible" value="{{$venta->total}}" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Total</label>
						<p style="color: #000; font-weight: bold;">Nota: El sistema calculara el total del mano de obra mas el total de la venta.</p>
					</div>
					
					<div class="form-group">
						<label for="">Fecha de entrega</label>
						<input required="Ingresa el campo " type="date" name="fecha_entrega" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Telefono del CESIT</label>
						<input required="Ingresa el campo " type="text" name="telefono_cecit" class="form-control">
					</div>

					<div class="form-group">
						<button type="submit" onclick="mandarTiket();" class="btn btn-success">Agregar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

@stop