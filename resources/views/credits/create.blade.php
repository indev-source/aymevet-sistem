@extends('layouts.dashboard.dashboard')
@section('title','Clientes')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    Agregar credito
                </div>
                <div class="content">
                    <form action="{{asset(Auth::user()->rol.'/creditos')}}" method="post">
                        @csrf
                        @include('credits.form',['btn'=>'Agregar Credito'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop