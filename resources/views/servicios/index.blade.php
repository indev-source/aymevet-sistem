@extends('layouts.dashboard.dashboard')
@section('title','Servicios')
@section('content')
	@if (session('status_success'))
		<div class="alert alert-success">
			{!! session('status_success') !!}
		</div>
	@endif
	<div class="card">
		<div class="header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
			<h4 class="title">Listado de servicios.</h4>
		</div>
		<div class="content table-responsive ">
			@include('servicios.data')
		</div>
	</div>
@stop