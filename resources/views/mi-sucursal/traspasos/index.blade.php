@extends('layouts.dashboard.dashboard')
@section('title','Tus traspasos')
@section('content')
<div class="col-md-12">
    <div class="alert bg-primary">
        <strong class="color-white">¡Verifica que los productos que te envian sean correctos!</strong>
    </div>
    <div class="card">
		<div class="header flex">
			<h4 class="title text-uppercase">Traspasos recibidos</h4>
		</div> <hr>
		<div class="content table-responsive ">
            <div class="row">
                @foreach($traspasos as $traspaso)
                    <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                        <ul class="list-group">
                            <li class="list-group-item">Fecha: {{$traspaso->created_at->format('Y-m-d')}} | <a href="{{asset('reportes/traspaso/respaldo/'.$traspaso->id)}}">Imprimir reporte</a></li>
                            <li class="list-group-item">Usuario: {{$traspaso->user->name}} | Estatus: {{$traspaso->estatus}}</li>
                            <li class="list-group-item">
                                @if($traspaso->estatus == 'enviado')
                                    <form action="{{asset('mi-sucursal/traspasos/aceptar/'.$traspaso->id)}}" method="post">
                                        @csrf
                                        {{method_field('put')}}
                                        <button type="submit" class="btn btn-primary btn-sm"><span class="fa fa-check"></span>Aceptar traspaso</button>
                                    </form>
                                @else
                                    <div class="alert bg-primary">
                                        <strong class="color-white">Verificar que el administrador autorize el traspaso</strong>
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
		</div>
	</div>
</div>
@stop
