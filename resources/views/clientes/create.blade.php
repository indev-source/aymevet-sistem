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
                    Agregar un cliente nuevo
                @else
                    Actualizar Cliente
                @endif
            </h4>
		</div>
		<div class="content">
            <form action="{{asset(Auth::user()->rol.'/'.$url)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nombre completo</label>
                    <input type="text" value="{{$customer->nombre_completo}}" class="form-control" name="nombre_completo" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" value="{{$customer->email}}" name="email" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="text" name="telefono" value="{{$customer->telefono}}" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Credito autorizado</label>
                    <input type="text" name="credito_autorizado" value="{{$customer->credito_autorizado}}" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Direccion</label>
                    <textarea name="direccion" class="form-control" id="" cols="30" rows="10">
                        {{$customer->direccion}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="">Vendedor</label>
                    <select name="vendedor_id" class="form-control" id="">
                        <option value="{{$customer->vendedor_id}}" selected>{{$customer->seller->name}}</option>
                        @foreach($sellers as $vendedor)
                            <option value="{{$vendedor->id}}">{{$vendedor->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">

                    </button>
                </div>
            </form>
        </div>
	</div>
</div>
@stop
