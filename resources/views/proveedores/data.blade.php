<table  id="data" class="table table-striped table-bordered">
	<thead>
		<th class="text-center">Nombre</th>
		<th class="text-center">Email</th>
		<th class="text-center">Telefono</th>
		<th class="text-center">Acciones</th>
	</thead>
	<tbody>
		@foreach($providers as $provider)
			<tr>
				<td class="text-center">
					{{$provider->nombre_completo}}
                </td>
				<td class="text-center">{{$provider->email}}</td>
				<td class="text-center">{{$provider->telefono}}</td>
				<td class="text-center">
					<a href="{{asset(Auth::user()->rol == 'administrador' ? 'administrador/proveedores/'.$provider->id.'/edit' : '#')}}" class="btn btn-primary btn-sm"><span class="fa fa-edit"></span> Actualizar </a>
					<a href="{{asset('productos-proveedor?proveedor='.$provider->id)}}" class="btn btn-info btn-sm"> <span class="fa fa-shopping-basket"></span> Productos</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<div class="content">
	
</div>