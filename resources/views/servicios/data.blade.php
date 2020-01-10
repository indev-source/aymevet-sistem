<table  id="data" class="table table-striped table-bordered">
	<thead>
		<th class="text-center">Total</th>
		<th class="text-center">Mano de obra</th>
		<th class="text-center">Entrega</th>
		<th class="text-center">Fecha</th>
		<th class="text-center">Sucursal</th>
		<th class="text-center">Vendedor</th>
		<th class="text-center">Estatus</th>
	</thead>

	<tbody>
		@foreach($servicios as $servicio)
			<tr>
				<td class="text-center">
					<a href="{{asset('servicio/'.$servicio->id)}}">${{number_format($servicio->total,2,'.',',')}}</a>
				</td>
				<td class="text-center">${{number_format($servicio->mano_obra,2,'.',',')}}</td>
				<td class="text-center">{{$servicio->fecha_entrega}}</td>
				<td class="text-center">{{$servicio->fecha_servicio}}</td>
				<td class="text-center">{{$servicio->sucursal}}</td>
				<td class="text-center">{{$servicio->vendedor}}</td>
				<td class="text-center">{{$servicio->status}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<div class="content">
	
</div>