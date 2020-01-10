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
			<h4 class="title">
                @if($operacion == 0)
                    Agregar un proveedor nuevo
                @else
                    Actualizar proveedor
                @endif
            </h4>
		</div>
		<div class="content">
            <form action="{{asset(Auth::user()->rol.'/'.$url)}}" method="post">
                @csrf 
                @if($operacion == 1)
                    {{method_field('put')}}
                @endif
                <div class="form-group">
                    <label for="">Nombre completo</label>
                    <input type="text" value="{{$cliente->nombre_completo}}" class="form-control" name="nombre_completo" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" value="{{$cliente->email}}" name="email" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="text" name="telefono" value="{{$cliente->telefono}}" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        @if($operacion == 0)
                            Agregar nuevo proveedor
                        @else
                            Actualizar proveedor
                        @endif
                    </button>
                </div>
            </form>
        </div>
	</div>
</div>
@stop  