@extends('layouts.dashboard.dashboard')
@section('title','Sucursales')
@section('content')

<div class="col-md-12">
	@if (session('status_success'))
        <div class="alert alert-success">
            {!! session('status_success') !!}
        </div>
    @endif
	<div class="card">
		<div class="header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
			<h4 class="title">Rutas</h4>
			<p class="category">
				<a class="btn btn-success btn-sm" href="{{asset(Auth::user()->rol.'/sucursales/create')}}" >
					Agregar ruta
				</a>
			</p>
		</div>
		<div class="content table-responsive ">
			<table id="data" class="table table-striped table-bordered">
				<thead>
					<th class="text-center">Nombre</th>
					<th class="text-center">Tarjeta</th>
					<th class="text-center">Acciones</th>
				</thead>
				<tbody>
					@foreach($business as $bs)
						<tr>
							<td class="text-center">
								{{$bs->nombre}}
							</td>
							<td class="text-center">{{$bs->tarjeta}}%</td>
							<td class="text-center">
								<a class="btn btn-primary btn-sm" href="{{asset(Auth::user()->rol == 'administrador' ? 'administrador/sucursales/'.$bs->id.'/edit' : '#')}}" ><span class="fa fa-edit"></span> Actualizar</a>
								<a class="btn btn-info btn-sm" href="{{asset(Auth::user()->rol == 'administrador' ? 'productos-sucursal?sucursal='.$bs->id : '#')}}" ><span class="fa fa-shopping-basket"></span> Productos</a>
								<a class="btn btn-info btn-sm" href="{{asset(Auth::user()->rol == 'administrador' ? 'administrador/sucursales/'.$bs->id.'/edit' : '#')}}" ><span class="fa fa-money"></span> Ventas</a>
								<a class="btn btn-info btn-sm" href="{{asset(Auth::user()->rol == 'administrador' ? 'administrador/sucursales/'.$bs->id.'/edit' : '#')}}" ><span class="fa fa-undo"></span> Traspasos</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop