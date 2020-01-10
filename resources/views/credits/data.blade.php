<table  id="data" class="table table-striped table-bordered">
	<thead>
		<th class="text-center">Cliente</th>
		<th class="text-center">Total</th>
        <th class="text-center">Abonos</th>
        <th class="text-center">Retante</th>
		<th class="text-center">Fecha</th>
		<th class="text-center">Estatus</th>
		<th class="text-center">Acciones</th>
	</thead>
	<tbody>
		@foreach($credits as $credit)
			<tr>
				<td class="text-center">{{$credit->sale()->customer->nombre_completo}}</td>
				<td class="text-center">${{number_format($credit->sale()->total,2,',','.')}}</td>
                <td class="text-center">${{number_format($credit->payed(),2,',','.')}}</td>
                <td class="text-center">${{number_format($credit->toPay(),2,',','.')}}</td>
				<td class="text-center">{{$credit->fecha}}</td>
				<td class="text-center">
					<span class="label {{$credit->estatus == 'adeudo' ? 'label-danger' : 'label-success'}}">{{$credit->estatus}}</span>
				</td>
				<td class="text-center">
                    <a href="{{asset('administrador/creditos/'.$credit->id)}}" class="btn btn-info btn-sm"><span class="fa fa-money"></span> Ver detalle</a>
                </td>
			</tr>
		@endforeach
	</tbody>
</table>
<div class="content">

</div>
