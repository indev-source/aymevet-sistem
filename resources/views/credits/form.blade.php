<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Cliente</label>
            <select name="cliente" class="form-control" id="">
                <option selected value="">Selecciona un cliente</option>
                @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->nombre_completo}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>