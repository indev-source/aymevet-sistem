@extends('layouts.dashboard.dashboard')
@section('title','Sincronizaciones')
@section('content')
    
    <button id="sincronizar" class="btn btn-primary">sincronizar</button>
    
@stop

@section('js')
    <script src="https://www.gstatic.com/firebasejs/7.2.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.3/firebase-firestore.js"></script>
    <script src="{{asset('sincronizacion-js/sync.js')}}"></script>
@stop