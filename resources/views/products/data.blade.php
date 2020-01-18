<table  id="data" class="table table-striped table-bordered">
	<thead>
		<th class="text-center">Nombre</th>
		<th class="text-center">Stock</th>
		<th class="text-center">Costo</th>
		<th class="text-center">Categoria</th>
		<th class="text-center">Marca</th>
		<th class="text-center">Proveedor</th>
		<th class="text-center">Ruta</th>
		<th class="text-center">Acciones</th>
	</thead>
	<tbody>
		@foreach($products as $product)
			<tr>
				<td class="text-center">{{$product->nombre}}</td>
				<td class="text-center">
					<span class="label {{$product->existencia <= 5 ? 'label-danger' : 'label-success'}}">{{$product->existencia}}</span>
				</td>
				<td class="text-center">${{number_format($product->costo,2,'.',',')}}</td>
				<td class="text-center">{{$product->categoria->nombre}}</td>
				<td class="text-center">{{$product->marca->nombre}}</td>
				<td class="text-center">{{$product->proveedor->nombre_completo}}</td>
				<td class="text-center">{{$product->sucursal->nombre}}</td>
				<td class="text-center">
					<a href="{{asset(Auth::user()->rol == 'administrador' ? 'administrador/productos/'.$product->id.'/edit' : '#')}}" class="btn btn-sm btn-primary"><span class="fa fa-edit"></span> Actualizar</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<div class="content">
	
</div>
