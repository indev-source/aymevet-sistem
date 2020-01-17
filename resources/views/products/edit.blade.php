@extends('layouts.dashboard.dashboard')
@section('title','Editar producto')
@section('content')
<div class="col-md-12">
	@if (session('status_warning'))
        <div class="alert alert-warning">
            {!! session('status_warning') !!}
        </div>
    @endif
	<div class="card">
		<div class="header">
			<h4 class="title">Actualizar Producto</h4>
		</div> <hr>
		<div class="dis-flex" style="display: flex; margin-left: 20px;">
			<form action="{{asset('administrador/productos/'.$product->id)}}" method="POST" class="btn-margin" style="margin:5px;">
				{{method_field('delete')}}
				@csrf
				<button class="btn btn-danger">Dar de baja</button>
			</form>
		</div>
		<div class="content content-form table-responsive table-full-width">
			<form action="{{asset('administrador/productos/'.$product->id)}}" method="post">
				@csrf
				{{method_field('put')}}
				<div class="row">
					<div class="col-md-6">
						<label for="">Nombre del producto</label>
						<input type="text" required  class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" placeholder="Ingresa el nombre del producto" value="{{$product->nombre}}">
						@if ($errors->has('nombre'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('nombre') }}</strong>
							</span>
						@endif
					</div>
					<div class="col-md-6">
						<label for="">Codigo de barras </label>
						<input type="text"  class="form-control {{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" placeholder="Ingresa el codigo de barras" value="{{$product->codigo}}">
						@if ($errors->has('codigo'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('codigo') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label for="">Existencia en bodega</label>
						<input type="number" min="1" disabled value="{{$product->existencia}}" required class="form-control {{ $errors->has('existencia') ? ' is-invalid' : '' }}" name="existencia" placeholder="Ingresa la existencia del producto en inventario">
						@if ($errors->has('existencia'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('existencia') }}</strong>
							</span>
						@endif
					</div>
					<div class="col-md-6">
						<label for="">Costo del producto. <a id="calcular" style="color:#333; cursor: pointer;">Calcular precios</a></label>
						<input type="number" id="costo" step="any" min="1" required class="form-control {{ $errors->has('costo') ? ' is-invalid' : '' }}" name="costo" value="{{$product->costo}}" placeholder="Ingresa el costo del producto">
						@if ($errors->has('costo'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('costo') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Porcentaje 1</label>
							<input type="text" required value="{{$product->porcentaje1}}" id="p1" class="form-control" name="porcentaje1">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Porcentaje 2</label>
							<input type="text" value="{{$product->porcentaje2}}" id="p2" required class="form-control" name="porcentaje2">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Porcentaje 3</label>
							<input type="text" id="p3" value="{{$product->porcentaje3}}" required class="form-control" name="porcentaje3">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Precio 1</label>
							<input type="text" value="{{$product->precio1}}" id="pre1" required class="form-control" name="precio1">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Precio 2</label>
							<input type="text"  value="{{$product->precio2}}" id="pre2" required class="form-control" name="precio2">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Precio 3</label>
							<input type="text"  value="{{$product->precio3}}" id="pre3" required class="form-control" name="precio3">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<label for="">Sucursal</label>
						<select name="bussine_id" required  class="form-control {{ $errors->has('bussine_id') ? ' is-invalid' : '' }}"  >
							<option value="{{$product->bussine_id}}" selected="">{{$product->sucursal->nombre}}</option>
							@foreach($bussines as $bussine)
								<option value="{{$bussine->id}}">{{$bussine->nombre}}</option>
							@endforeach
						</select>
						@if ($errors->has('bussine_id'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('bussine_id') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label for="">Foto del producto</label>
						<input type="file"  class="form-control" name="foto" placeholder="Ingresa el  precio de venta del producto.">
						
					</div>
					<div class="col-md-6">
						<label for="">Categoria del producto</label>
						<select name="category_id"  required class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}"  id="">
							<option value="{{$product->categoria_id}}" selected="">{{$product->categoria->nombre}}</option>
							@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->nombre}}</option>
							@endforeach
						</select>
						@if ($errors->has('category_id'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('category_id') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label for="">IVA del producto</label>
						<input type="number" value="{{$product->iva}}" step="any" min="0" required class="form-control {{ $errors->has('iva') ? ' is-invalid' : '' }}" name="iva" placeholder="Ingresa el  IVA del producto.">
						@if ($errors->has('iva'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('iva') }}</strong>
							</span>
						@endif
					</div>
					<div class="col-md-6">
						<label for="">Clave de unidad del producto</label>
						<input type="text" value="{{$product->clave_unidad}}"  class="form-control {{ $errors->has('clave_unidad') ? ' is-invalid' : '' }}" name="clave_unidad" placeholder="Ingresa la clave de unidad del producto.">
						@if ($errors->has('clave_unidad'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('clave_unidad') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<label for="">Clave del producto</label>
						<input type="text" value="{{$product->clave_producto}}"  required class="form-control {{ $errors->has('clave_producto') ? ' is-invalid' : '' }}" name="clave_producto" placeholder="Ingresa la clave  del producto.">
						@if ($errors->has('clave_producto'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('clave_producto') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Lote</label>
							<input type="text" value="{{$product->lote}}" class="form-control" name="lote" placeholder="Ingresa el lote del producto">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">IESP</label>
							<input type="text" value="{{$product->ieps}}" class="form-control" name="ieps" placeholder="Ingresa el IEPS del producto">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Marca</label>
							<select name="marca_id" id="" class="form-control">
								<option value="{{$product->marca_id}}" selected>{{$product->marca->nombre}}</option>
								@foreach($brands as $brand)
									<option value="{{$brand->id}}">{{$brand->id}}.{{$brand->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Proveedor</label>
							<select name="proveedor_id" class="form-control" id="">
								<option selected value="{{$product->proveedor_id}}">{{$product->proveedor->nombre_completo}}</option>
								@foreach($providers as $provider)
									<option value="{{$provider->id}}">{{$provider->id}}.{{$provider->nombre_completo}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<label for="">Caducidad</label>
						<input type="date" value="{{$product->caducidad}}" class="form-control" name="caducidad">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<label for="">Descripcion del producto</label>
						<textarea name="descripcion" class="form-control" id="" cols="30" rows="10">{{$product->descripcion}}</textarea>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<button type="submit" class="btn btn-success margin-top margen-izquierda">Actualizar Producto</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@stop
@section('js')
	<script>
		let btnCalcularPrecio = document.querySelector('#calcular');
		btnCalcularPrecio.addEventListener('click',()=>{
			let costo = document.querySelector('#costo').value;
			let por1  = document.querySelector('#p1').value;
			let por2  = document.querySelector('#p2').value;
			let por3  = document.querySelector('#p3').value;
			if(verificarPorcentajes(por1,por2,por3,costo))
				calcular(por1,por2,por3,costo);
			else
				alert("porcentajes o costos incompletos");
		})
		function verificarPorcentajes(por1,por2,por3,costo){

			if(por1 == '' || por2 == '' || por3 == '' || costo == '')
				return false;
			return true;
		}
		function calcular(por1,por2,por3,costo){
			let precio1 = (parseFloat(costo) + parseFloat(costo*por1) / 100);
			let precio2 = (parseFloat(costo) + parseFloat(costo*por2) / 100);
			let precio3 = (parseFloat(costo) + parseFloat(costo*por3) / 100);

			console.log("Precio1 : "+precio1);
			console.log("Precio2 : "+precio2);
			console.log("Precio3 : "+precio3);

			let pre1 = document.querySelector('#pre1');
			let pre2 = document.querySelector('#pre2');
			let pre3 = document.querySelector('#pre3');

			pre1.setAttribute('value',parseFloat(precio1).toFixed(2));
			pre2.setAttribute('value',parseFloat(precio2).toFixed(2));
			pre3.setAttribute('value',parseFloat(precio3).toFixed(2));
		}
	</script>
@stop
