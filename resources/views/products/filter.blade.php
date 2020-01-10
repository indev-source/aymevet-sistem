<form action="{{asset('administrador/productos')}}" method="get">
	<div class="row">	
		<div class="col-md-3">
			<label for="">Buscar producto por categoria</label>
			<select class="form-control" name="categoria" id="">
				<option selected="" value="0">Todas las categorias</option>
				@foreach($categories as $category)
					<option  value="{{$category->id}}">{{$category->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-3">
			<label for="">Buscar producto por marca</label>
			<select class="form-control" name="categoria" id="">
				<option selected=""  value="0">Todas las marcas</option>
				@foreach($brands as $brand)
				<option value="{{$brand->id}}">{{$brand->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-3">
			<label for="">Buscar producto por proveedor</label>
			<select class="form-control" name="categoria" id="">
				<option selected="" value="0">Todas los proveedores</option>
				@foreach($providers as $providers)
					<option  value="{{$providers->id}}">{{$providers->nombre_completo}}</option>
				@endforeach
			</select>
		</div>
		@if(Auth::user()->rol == 'administrador')
		<div class="col-md-3">
			<label for="">Buscar productos por sucursal</label>
			<select class="form-control" name="bussine" id="">
				<option selected=""  value="0">Todas las sucursales</option>
				@foreach($bussines as $bussine)
					<option value="{{$bussine->id}}">{{$bussine->nombre}}</option>
				@endforeach
			</select>
		</div>
		@endif
		<div class="col-md-12">
			<div class="form-group category">
				<button type="submit" class="btn btn-success">Filtar</button>
			</div>
		</div>
	</div>	
</form>
