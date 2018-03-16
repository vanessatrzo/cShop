@extends('layout')

@section('header')
	<ol class="breadcrumb">
		<li><a href="/">Inicio</a></li>
		<li><a href="{{ route('clientes.index') }}"><span>Clientes</span></a></li>
		<li class="active"><span>Perfil</span></li>
	</ol>
@stop
@section('title')
	<i class="fa fa-user"></i>
	Perfil de Cliente
@stop

@section('content')
	<div class="row">
		<div class="col-lg-4">
			<div class="main-box clearfix">
				<div class="main-box-body clearfix" align="center">
					<img width="60%" src="{{ Storage::url($client->ife) }}" alt="" />
					<br><br>
					<div class="profile-label">
						<span class="label label-info label-large" style="text-transform:uppercase;">{{ $client->code }}</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="main-box clearfix">
				<header class="main-box-header clearfix">
					<h2 style="text-transform:capitalize;">{{ $client->name }}</h2>
				</header>

				<div class="main-box-body clearfix">
					<div class="col-lg-12">
						<ul class="fa-ul">
							<li>
								<i class="fa-li fa fa-calendar"></i>
								Creación: 
								<span>{{ $client->created_at }}</span>
							</li>
						</ul>
						<br>
						<div class="col-lg-6">
							<i class="fa fa-map-marker"></i>
							&nbsp;
							<strong>Dirección</strong>
							<ul class="fa-ul">
								<li>
									Calle: 
									<span>{{ $client->street }}</span>
								</li>
								<li>
									Colonia: 
									<span>{{ $client->col }}</span>
								</li>
								<li>
									Número Ext.: 
									<span>{{ $client->nex }}</span>
								</li>
								<li>
									Número Int.: 
									<span>{{ $client->nin }}</span>
								</li>
								<li>
									C.P.: 
									<span>{{ $client->pc }}</span>
								</li>
							</ul>
						</div>
						<div class="col-lg-6">
							<i class="fa fa-phone"></i>
							&nbsp;
							<strong>Contacto</strong>
							<ul class="fa-ul">
								<li>
									Correo: 
									<span>{{ $client->email }}</span>
								</li>
								<li>
									Teléfono: 
									<span>{{ $client->phone }}</span>
								</li>
								<li>
									Celular: 
									<span>{{ $client->cell }}</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop


