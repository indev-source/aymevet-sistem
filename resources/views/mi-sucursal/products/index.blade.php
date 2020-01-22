@extends('layouts.dashboard.dashboard')
@section('title','Mis productos')
@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
			<h4 class="title">Tus productos</h4>
		</div>
		<div class="content table-responsive ">
			@include('products.data')
		</div>
	</div>
</div>
@stop