@extends('layouts.dashboard.dashboard')
@section('title','Inventario')
@section('content')
<div class="col-md-12">
	@include('alerts.alert-success')
	@include('products.filter')
	<div class="card">
		<div class="header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
			<h4 class="title">{{$msg}}</h4>
			<p class="category">
				<a class="btn btn-success btn-sm" href="{{asset(Auth::user()->rol.'/productos/create')}}">Agregar producto</a>
			</p>
		</div>
		<div class="content table-responsive ">
			@include('products.data')
		</div>
	</div>
</div>
@stop