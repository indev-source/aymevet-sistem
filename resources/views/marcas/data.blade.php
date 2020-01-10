<table  id="data" class="table table-striped table-bordered">
	<thead>
		<th class="text-center">Nombre</th>
		<th class="text-center">Acciones</th>
	</thead>
	<tbody>
		@foreach($brands as $brand)
			<tr>
				<td class="text-center">
                   {{$brand->nombre}}
                </td>
				<td class="text-center">
                	<a href="{{asset(Auth::user()->rol == 'administrador' ? 'administrador/marcas/'.$brand->id.'/edit' : '#')}}" class="btn btn-primary btn-sm"><span class="fa fa-edit"></span> Actualizar</a>
					<a href="{{asset('productos-marca?marca='.$brand->id)}}" class="btn btn-info btn-sm"> <span class="fa fa-shopping-basket"></span> Productos</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<div class="content">
	
</div>