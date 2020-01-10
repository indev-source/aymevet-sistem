@extends('layouts.dashboard.dashboard')
@section('title','Empleados')
@section('content')
    <div class="col-md-12">
        @if (session('status_success'))
            <div class="alert alert-success">
                {!! session('status_success') !!}
            </div>
        @endif
        <div class="card">
            <div class="header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
                <h4 class="title">Agregar nueva compra</h4>
            </div>
            <div class="content">
                <form action="{{asset('administrador/compras')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Total: </label>
                        <input type="number" class="form-control" step="any" name="total" required>
                    </div>
                    <div class="form-group">
                        <label for="">Fecha de compro: </label>
                        <input required type="date" class="form-control" name="fecha">
                    </div>
                    <div class="form-group">
                        <label for="">Tipo de compra: </label>
                        <select class="form-control" name="tipo_compra" required id="">
                            <option value="">Selecciona una opción</option>
                            <option onclick="contado();" value="contado">Contado</option>
                            <option onclick="credito();" value="credito">Credito</option>
                        </select>
                    </div>
                    <div class="form-group desactivate" id="credito-compra">
                        <label for="">Fecha de pago: </label>
                        <input type="date" class="form-control" name="fecha_pago">
                    </div>
                    <button class="btn btn-success" type="submit">Seleccionar productos</button>
                </form>
            </div>
        </div>
    </div>
@stop

<script>
    function credito(){
        let credito_compra  = document.querySelector("#credito-compra");
        console.log(credito_compra)
        credito_compra.classList.remove('desactivate');
    }
    function contado(){
        let credito_compra  = document.querySelector("#credito-compra");
        console.log(credito_compra)
        credito_compra.classList.add('desactivate');
    }
</script>
