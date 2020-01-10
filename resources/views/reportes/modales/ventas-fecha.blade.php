<div class="modal fade bd-example-modal-lg-fechav" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title">Seleccionar una sucursal</h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="{{asset('reportes/ventas/fechas')}}" method="get">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Fecha Inicial: </label>
                                <input type="date" required value="{{now()}}" class="form-control" name="date1">
                            </div>
                            <div class="form-group">
                                <label for="">Fecha Final: </label>
                                <input type="date" required value="{{now()}}" class="form-control" name="date2">
                            </div>
                            <div class="form-group">
                                <label for="">Sucursal: </label>
                                <select name="sucursal" class="form-control" id="">
                                    <option value="0">Selecciona una sucursal</option>
                                    @foreach($bussines as $busine)
                                        <option value="{{$busine->id}}">{{$busine->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Obtener Reporte</button>
                        </div>
                    </form>
                    {{$bussines->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
