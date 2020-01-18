@extends('layouts.dashboard.dashboard')
@section('title',Auth::user()->name)
@section('content')
<div class="row">
	<div class="col-md-5 col-lg-4 col-sm-12 col-xs-12">
		<div class="card card-user">
			<div class="image">
				<img src="{{asset('banner-profile.jpg')}}" alt="..."/>
			</div>
			<div class="content">
				<div class="author">
					<img class="avatar border-white" src="{{asset('default.png')}}" alt="..."/>
					<h4 class="title text-uppercase">{{$user->name}}</h4>
				</div>
			</div>
			<div class="content">
				<div class="row">
					<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
						<div class="card">
							<div class="card-title"><h5 class="title text-uppercase text-center">Ventas</h5></div>
							<div class="content">
								<img src="{{asset('sale.png')}}" class="img-width-total cursor-pointer" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
		@include('alerts.alert-success')
		<div class="card">
			<div class="header">
				<h4 class="title text-uppercase">actualizar datos</h4>
			</div>
			<div class="content">
				<div class="row">
					<form action="{{asset('administrador/usuarios/'.$user->id)}}" method="post" class="padding-form">
						@csrf
						{{method_field('put')}}
						<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="">Nombre del empleado</label>
								<input type="text" class="form-control" name="name" value="{{$user->name}}">
							</div>
						</div>
						<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="">Celular del empleado</label>
								<input type="text" class="form-control" name="celular" value="{{$user->celular}}">
							</div>
						</div>
						<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="">Correo electronico del empleado</label>
								<input type="text" class="form-control" name="email" value="{{$user->email}}">
							</div>
						</div>
						<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="">Rol: <span class="color-primary text-uppercase">{{$user->rol}}</span></label>
								<a href="" class="btn btn-primary form-control">Volverlo administrador</a>
							</div>
						</div>
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="">Ruta del vendedor</label>
								<select name="bussine_id" id="" class="form-control">
									<option value="{{$user->business->id}}">{{$user->business->nombre}}</option>
									@foreach($bussines as $bs)
										<option value="{{$bs->id}}">{{$bs->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>
						
						<button class="btn btn-primary"><span class="fa fa-edit"></span> Actualizar datos</button>
					</form>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
						<form action="{{asset('administrador/usuarios/password-update/'.$user->id)}}" method="POST">
							@csrf
							{{method_field('put')}}
							<div class="form-group">
								<label for="">Actualizar contraseña</label>
								<input type="password" class="form-control" name="password" required>
							</div>
							<button class="btn btn-primary"><span class="fa fa-lock"></span> Actualizar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop