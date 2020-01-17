<div class="card">
	<div class="header">
		<h4 class="text-uppercase title">filtrar datos</h4>
	</div>
	<div class="content">
		<form action="{{asset('filtrar')}}" method="GET">
			@csrf
			<div class="row">
				<div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
					<div class="form-group">
						<label for="">Categoria</label>
						<select class="form-control" name="categoria" id="">
							<option value="" selected>Selecciona una categoria</option>
							@foreach($categoriesFilter as $category)
								<option value="{{$category->id}}">{{$category->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
					<div class="form-group">
						<label for="">Proveedor</label>
						<select class="form-control" name="proveedor" id="">
							<option value="" selected>Selecciona un proovedor</option>
							@foreach($providersFilter as $provider)
								<option value="{{$provider->id}}">{{$provider->nombre_completo}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
					<div class="form-group">
						<label for="">Marca</label>
						<select class="form-control" name="marca" id="">
							<option value="" selected>Selecciona una marca</option>
							@foreach($brandFilter as $brand)
								<option value="{{$brand->id}}">{{$brand->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
					<div class="form-group">
						<label for="">Ruta</label>
						<select class="form-control" name="ruta" id="">
							<option value="" selected>Selecciona una ruta</option>
							@foreach($businessFilter as $business)
								<option value="{{$business->id}}">{{$business->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12 text-center">
					<button class="btn btn-success"><span class="fa fa-search"></span> Buscar</button>
				</div>
			</div>
		</form>
	</div>
	<div class="content">
		<h5 class="text-uppercase color-green">{{$products->count()}} producto(s) contrados | <a  href="/administrador/productos" class="color-green">ver todos</a></h5>
	</div>
</div>