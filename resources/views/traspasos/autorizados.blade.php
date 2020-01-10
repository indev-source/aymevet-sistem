@extends('layouts.dashboard.dashboard')
@section('title','Traspasos')
@section('content')
    <div class="col-md-12">
        @if (session('status_success'))
            <div class="alert alert-success">
                {!! session('status_success') !!}
            </div>
        @endif
        <div class="card">
            <div class="header">
                <h4 class="title">Listado de traspasos autorizados.</h4>
            </div>
            <div class="content table-responsive ">
                @include('traspasos.data.autorizados')
            </div>
        </div>
    </div>
@stop
