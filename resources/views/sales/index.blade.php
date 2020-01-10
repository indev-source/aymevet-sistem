@extends('layouts.dashboard.dashboard')
@section('title','Ventas')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h5 class="card-title">{{$msg}}</h5>
				</div>
				<div class="content">
					@include('sales.data')
				</div>
			</div>
		</div>
	</div>
@stop
