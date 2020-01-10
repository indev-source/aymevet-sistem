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
			<h4 class="title">Listado de clientes</h4>
			<p class="category">
                <a class="btn btn-success btn-sm" href="{{asset('clientes/create')}}">Agregar cliente</a>
			</p>
		</div>
		<div class="content table-responsive ">
			@include('clientes.data')
		</div>
	</div>
</div>
@stop
