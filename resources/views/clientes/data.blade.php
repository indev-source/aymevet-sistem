<table  id="data" class="table table-striped table-bordered">
	<thead>
		<th class="text-center">Nombre</th>
		<th class="text-center">Telefoni</th>
		<th class="text-center">Vendedor</th>
		<th class="text-center">Estatus</th>
        <th class="text-center">Acciones</th>
	</thead>
	<tbody>
		@foreach($clientes as $cliente)
			<tr>
				<td class="text-center">{{$cliente->nombre_completo}}</td>
				<td class="text-center">{{$cliente->telefono}}</td>
				<td class="text-center">{{$cliente->seller->name}}</td>
				<td class="text-center">{{$cliente->estatus}}</td>
                <td class="text-center">

                    <a href="{{asset('clientes/'.$cliente->id.'/edit')}}" class="btn btn-info btn-sm"><span class="fa fa-edit"></span> Actualizar</a>
                    <a href="{{asset('ventas-cliente?cliente='.$cliente->id)}}" class="btn btn-info btn-sm"><span class="fa fa-balance-scale"></span> Ver compras</a>
                </td>
			</tr>
		@endforeach
	</tbody>
</table>
<div class="content">

</div>
