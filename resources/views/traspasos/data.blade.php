<table id="data" class="table">
	<thead>
		<th class="text-center">Sucursal</th>
		<th class="text-center">Usuario</th>
		<th class="text-center">Fecha</th>
		<th class="text-center">Estatus</th>
		<th class="text-center">Detalle</th>
	</thead>
	<tbody>
		@foreach($traspasos as $traspaso)
			<tr>
				<td class="text-center">{{$traspaso->business->nombre}}</td>
				<td class="text-center">{{$traspaso->user->name}}</td>
				<td class="text-center">{{$traspaso->created_at}}</td>
				<td class="text-center text-uppercase">{{$traspaso->estatus}}</td>
				<td class="text-center">
					<a href="{{asset('/administrador/traspasos/'.$traspaso->id)}}" class="btn btn-success btn-sm">Detalle</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

