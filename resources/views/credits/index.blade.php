@extends('layouts.dashboard.dashboard')
@section('title','Clientes')
@section('content')
<div class="card">
    <div class="header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
        <h4 class="title">Creditos del sistema</h4>
    </div>
    <div class="content table-responsive ">
        @include('credits.data')
    </div>
</div>
@stop