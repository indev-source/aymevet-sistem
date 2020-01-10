<div class="card" style="border:1px solid rgba(0,0,0,.4) !important;">
    <div class="header">
        <h4 class="title">Productos de la venta</h4> <hr style="margin-bottom: 3px;">
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-striped">
            <thead>
                <th class="text-center">Producto</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Subtotal</th>
                <th class="text-center">Accion</th>
            </thead>
            <tbody>
                @foreach($products as $producto)
                <tr>
                    <td class="text-center">{{$producto->nombre}}</td>
                    <td class="text-center">${{number_format($producto->precio,2,'.',',')}}</td>
                    <td class="text-center">
                        {{$producto->cantidad}}
                    </td>
                    <td class="text-center">${{number_format($producto->subtotal,2,'.',',')}}</td>
                    @include('sales.form-delete-product-on-sale')
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>