<table id="data" class="table table-striped table-bordered">
    <thead>
        <th class="text-center">FOL</th>
        <th class="text-center">Total</th>
        <th class="text-center">Vendedor</th>
        <th class="text-center">Cliente</th>
        <th class="text-center">Ruta</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Estatus</th>
        <th class="text-center">

        </th>
    </thead>
    <tbody>
    @foreach($sales as $sale)
        <tr>
            <td class="text-center">{{$sale->id}}</td>
            <td class="text-center">${{number_format($sale->total,2,'.',',')}}</td>
            <td class="text-center">{{$sale->seller->name}}</td>
            <td class="text-center">{{$sale->customer->nombre_completo}}</td>
            <td class="text-center">{{$sale->business->nombre}}</td>
            <td class="text-center">{{$sale->fecha}}</td>
            <td class="text-center">{{$sale->estatus}}</td>
            <td class="text-center">
                <a href="{{asset(Auth::user()->rol.'/ventas/'.$sale->id)}}" class="btn btn-success btn-sm">Detalle</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
