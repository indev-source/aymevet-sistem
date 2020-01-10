<div class="modal fade bd-example-modal-lg-inventario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title">Seleccionar una sucursal</h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach($bussines as $bussine)
                        <form action="{{asset('reportes/inventario/sucursal')}}" method="get">
                            <input type="hidden" name="sucursal" value="{{$bussine->id}}">
                            <div class="col-md-3">
                                <div class="card text-center">
                                    <div class="header">
                                        <h5 class="title">
                                            Ruta: {{$bussine->nombre}}
                                        </h5>
                                    </div>
                                    <div class="content">
                                        <img style="width: 100%;" src="https://image.flaticon.com/icons/svg/31/31520.svg" alt="">
                                    </div>
                                    <button onclick="sales({{$bussine->id}});" style="margin-bottom: 10px;" type="submit" class="btn btn-success">Seleccionar</button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                    {{$bussines->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
