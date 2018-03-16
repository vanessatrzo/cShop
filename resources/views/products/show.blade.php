@extends('layout')

@section('header')
	<ol class="breadcrumb">
		<li><a href="/">Inicio</a></li>
		<li><a href="{{ route('usuarios.index') }}"><span>Usuarios</span></a></li>
		<li class="active"><span>Perfil</span></li>
	</ol>
@stop
@section('title')
	<i class="fa fa-user"></i>
	Perfil de Usuario
@stop

@section('content')
	<div class="row" id="user-profile">
		<div class="col-lg-3 col-md-4 col-sm-4">
			<div class="main-box clearfix">
				<header class="main-box-header clearfix">
					<h2>{{ $user->name }}</h2>
				</header>

				<div class="main-box-body clearfix">
					<div class="profile-status">
						<i class="fa fa-circle"></i> Online
					</div>

					<img src="{{asset('plugins/img/samples/scarlet-159.png')}}" alt="" class="profile-img img-responsive center-block" />

					<div class="profile-label">
						<span class="label label-danger">Admin</span>
					</div>

					

					<div class="profile-details">
						<div class="profile-since">
						Miembro desde: {{ $user->created_at }}
					</div>
					</div>

					<div class="profile-message-btn center-block text-center">
						<a href="#" class="btn btn-success">
							<i class="fa fa-envelope"></i>
							Enviar mensaje
						</a>
					</div>
				</div>

			</div>
		</div>

		<div class="col-lg-9 col-md-8 col-sm-8">
			<div class="main-box clearfix">
				<div class="tabs-wrapper profile-tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab-activity" data-toggle="tab">Actividades</a></li>
						<li><a href="#tab-chat" data-toggle="tab">Chat</a></li>
					</ul>

					<div class="tab-content">


						<div class="tab-pane fade  in active" id="tab-activity">

							<div class="table-responsive">
								<table class="table">
									<tbody>
										<tr>
											<td class="text-center">
												<i class="fa fa-comment"></i>
											</td>
											<td>
												Scarlett Johansson posted a comment in <a href="#">Avengers Initiative</a> project.
											</td>
											<td>
												2014/08/08 12:08
											</td>
										</tr>
										<tr>
											<td class="text-center">
												<i class="fa fa-truck"></i>
											</td>
											<td>
												Scarlett Johansson changed order status from <span class="label label-primary">Pending</span>
												to <span class="label label-success">Completed</span>
											</td>
											<td>
												2014/08/08 12:08
											</td>
										</tr>
										<tr>
											<td class="text-center">
												<i class="fa fa-check"></i>
											</td>
											<td>
												Scarlett Johansson posted a comment in <a href="#">Lost in Translation opening scene</a> discussion.
											</td>
											<td>
												2014/08/08 12:08
											</td>
										</tr>
										<tr>
											<td class="text-center">
												<i class="fa fa-users"></i>
											</td>
											<td>
												Scarlett Johansson posted a comment in <a href="#">Avengers Initiative</a> project.
											</td>
											<td>
												2014/08/08 12:08
											</td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>

						<div class="tab-pane fade" id="tab-chat">
							<div class="conversation-wrapper">
								<div class="conversation-content">
									<div class="conversation-inner">

										<div class="conversation-item item-left clearfix">
											<div class="conversation-user">
												<img src="img/samples/ryan.png" alt=""/>
											</div>
											<div class="conversation-body">
												<div class="name">
													Ryan Gossling
												</div>
												<div class="time hidden-xs">
													September 21, 2013 18:28
												</div>
												<div class="text">
													I don't think they tried to market it to the billionaire, spelunking, 
													base-jumping crowd.
												</div>
											</div>
										</div>

									</div>
								</div>
								<div class="conversation-new-message">
									<form>
										<div class="form-group">
											<textarea class="form-control" rows="2" placeholder="Escribe el mensaje"></textarea>
										</div>

										<div class="clearfix">
											<button type="submit" class="btn btn-success pull-right">Enviar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop


