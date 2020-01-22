@extends('layouts.dashboard.dashboard')
@section('title','Clientes')
@section('content')
<div class="col-md-12">
	@if (session('status_success'))
        <div class="alert alert-success">
            {!! session('status_success') !!}
        </div>
    @endif
	<div class="card">
		<div class="header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
			<h4 class="title text-uppercase">registrar cliente</h4>
		</div>
		<div class="content">
            <form action="{{asset('administrador/clientes')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nombre completo</label>
                    <input type="text" class="form-control" name="nombre_completo" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email"  name="email" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="text" name="telefono"  class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Credito autorizado</label>
                    <input type="text" name="credito_autorizado"  class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Direccion</label>
                    <textarea name="direccion" class="form-control" id="" cols="30" rows="10"> </textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Registrar</button>
                </div>
            </form>
        </div>
	</div>
</div>
@stop
