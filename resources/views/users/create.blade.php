@extends('layout')

@section('header')
	<ol class="breadcrumb">
		<li><a href="/">Inicio</a></li>
		<li><a href="{{ route('usuarios.index') }}"><span>Usuarios</span></a></li>
		<li class="active"><span>Nuevo</span></li>
	</ol>
@stop

@section('title')
	<i class="fa fa-user"></i>
	Nuevo usuario
@stop

@section('content')
	<div style="width: 50%;margin: 0px 50px 0px 200px;padding: 0 1em;border-radius: 3px;">
		<div class="row">
			<div class="col-xs-12">
				<div id="login-box-inner">
					@if(session()->has('info'))
						<div class="alert alert-success">
							{{ session('info') }}
						</div>
					@endif
					
					@include('users.form', ['user' => new App\User])

					<div class="col-xs-12">
						<div class="col-xs-3"></div>
						<div class="col-xs-6">
							<button id="save" type="submit" class="btn btn-success col-xs-12">
								Guardar
							</button>
						</div>
						<div class="col-xs-3"></div>
					</div>					
				</div>
			</div>
		</div>
	</div>
@stop