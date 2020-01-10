@extends('layouts.dashboard.dashboard')
@section('content')
	<div class="card">
		<div class="header">
			<h4 class="title">Selecciona una ruta para traspasar</h4> <hr>
		</div>
		<div class="content" style="padding: 20px;">
			<div class="row">
				@foreach($bussines as $bussine)
                    <form action="{{asset('dashboard/v/admin/traspasos')}}" method="post">
                        @csrf
                        <input type="hidden" name="bussine_id" value="{{$bussine->id}}">
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="header">
                                    <h5 class="title">
                                        Ruta: {{$bussine->nombre}}
                                    </h5>
                                </div>
                                <div class="content">
                                    <img style="width: 100%;" src="https://image.flaticon.com/icons/svg/31/31520.svg" alt="">
                                </div>
                                <button style="margin-bottom: 10px;" type="submit" class="btn btn-success">Seleccionar</button>
                            </div>
                        </div>
                    </form>
				@endforeach
				{{$bussines->links()}}
			</div>
		</div>
	</div>
@stop
