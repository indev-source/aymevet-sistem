<div class="card">
	<div class="header">
		<h3 class="title">
			Folio de venta: {{$sale->id}}, Tota: ${{$sale->total}}
			<a href="{{asset('dashboard/venta?ticket='.$sale->id)}}" class="btn btn-xs btn-success">Reimprimir ticket</a>
			@if(Auth::user()->rol == 'administrador' and $sale->status != 'cancelado')
				
			@endif
			@if($sale->status == 'cancelado')
				<span class="label label-danger">Venta canceladas, los productos fuerón regresados al inventario</span>
			@endif
		</h3>
	</div>
	<div class="content table-responsive">
		<table id="data" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th class="text-center">Producto</th>
					<th class="text-center">Codigo</th>
					<th class="text-center">Cantidad</th>
					<th class="text-center">Precio</th>
					<th class="text-center">Subtotal</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $product)
				<tr>
					<td class="text-center">{{$product->nombre}}</td>
					<td class="text-center">{{$product->codigo}}</td>
					<td class="text-center">{{$product->cantidad}}</td>
					<td class="text-center">${{number_format($product->precio,2,'.',',')}}</td>
					<td class="text-center">${{number_format($product->subtotal,2,'.',',')}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
