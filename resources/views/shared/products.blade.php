<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title">Tu inventario</h4>
            </div>
            <div class="modal-body">
                <div class="content table-responsive ">
                    <table id="data" class="table table-striped">
                        <thead>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Existencia</th>
                            <th class="text-center">Precios</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Acciones</th>
                        </thead>
                        <tbody>
                            @foreach($productsByBusiness as $product)
                                <tr>
                                    <td class="text-center">{{$product->nombre}}</td>
                                    <td class="text-center">{{$product->existencia}} </td>
                                    <form action="{{asset('dashboard/orden/producto/inventario')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <td class="text-center">
                                            <select required="" class="form-control" name="price" id="">
                                                <option value="">Selecciona un precio</option>
                                                <option value="{{$product->precio1}}">1.${{number_format($product->precio1,2,'.',',')}}</option>
                                                <option value="{{$product->precio2}}">2.${{number_format($product->precio2,2,'.',',')}}</option>
                                                <option value="{{$product->precio3}}">3.${{number_format($product->precio3,2,'.',',')}}</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <input type="number" max="{{$product->existencia}}" @if($product->existencia == 0) disabled @endif class="form-control" name="cantidad">
                                        </td>
                                        <td class="text-center"> <button type="submit" @if($product->existencia == 0) disabled @endif class="btn btn-primary">Agregar</button</td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>