@extends('layouts.dashboard.dashboard')
@section('title','Registro de usuarios')
@section('content')
<div class="col-md-12">
	@include('alerts.alert-warning')
	<div class="card">
		<div class="header">
			<h4 class="title text-uppercase">registro de empleados</h4>
		</div> <hr>
		<div class="content content-form table-responsive table-full-width">
			<form action="{{asset('dashboard/v/admin/usuarios')}}" method="post">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<label for="">Nombre completo</label>
						<input type="text"  class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Ingresa el nombre completo del usuario" value="{{ old('name') }}">
						@if ($errors->has('name'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
					</div>
					<div class="col-md-6">
						<label for="">Celular</label>
						<input type="text"  class="form-control {{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" placeholder="Ingresa el celular del usuario">
						@if ($errors->has('celular'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('celular') }}</strong>
							</span>
						@endif
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-6">
						<label for="">Email</label>
						<input type="email"  class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" placeholder="Ingresa el email del usuario">
						@if ($errors->has('email'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
					<div class="col-md-6">
						<label for="">Password</label>
						<input type="password"  class="form-control {{ $errors->has('bussine_id') ? ' is-invalid' : '' }} " name="password" placeholder="Ingresa la contraseña del usuario">
						@if ($errors->has('password'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label for="">Rol</label>
						<select name="rol"  class="form-control {{ $errors->has('rol') ? ' is-invalid' : '' }}" name="rol" id="">
							<option value="" selected="">Selecciona el rol del usuario</option>
							<option value="administrador">Administrador</option>
							<option value="vendedor">Vendedor</option>
						</select>
						@if ($errors->has('rol'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('rol') }}</strong>
							</span>
						@endif
					</div>
					<div class="col-md-6">
						<label for="">Sucursal</label>
						<select name="bussine_id"  class="form-control {{ $errors->has('bussine_id') ? ' is-invalid' : '' }}" name="rol" id="">
							<option value="" selected="">Selecciona la sucursal del usuario</option>
							@foreach($bussines as $bussine)
							<option value="{{$bussine->id}}">{{$bussine->nombre}}</option>
							@endforeach
						</select>
						@if ($errors->has('bussine_id'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('bussine_id') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<label for="">Comision de usuario por ventas</label>
						<input type="number"  class="form-control {{ $errors->has('comision') ? ' is-invalid' : '' }}" value="{{ old('comision') }}"  name="comision" step="any"  placeholder="Ingresa el email del usuario">
						@if ($errors->has('comision'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('comision') }}</strong>
							</span>
						@endif
					</div>
				</div> <br><br>
				<button type="submit" class="btn btn-primary">Registrar Usuario</button>
			</form>
		</div>
	</div>
</div>
@stop