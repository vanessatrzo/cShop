@extends('layout')

@section('header')
	<ol class="breadcrumb">
		<li><a href="/">Inicio</a></li>
		<li class="active"><span>Usuarios</span></li>
	</ol>
@stop

@section('title')
	<i class="fa fa-users"></i>
	Usuarios
@stop

@section('button')
	<div class="pull-right top-page-ui">
		<a href="{{ route('usuarios.create') }}" class="btn btn-primary pull-right btn-lg">
			<i class="fa fa-plus fa-lg"></i> 
		</a>
	</div>
@stop

@section('content')
	<div class="row">
		<div class="col-lg-12">

			<div align="center">
				{!! $users->links() !!}
			</div>

			<div class="main-box no-header clearfix">
				<div class="main-box-body clearfix">
					<div class="table-responsive">
						@foreach($users as $user)
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="main-box clearfix profile-box-contact">
									<div class="main-box-body clearfix">
										<div class="profile-box-header green-bg clearfix">
											<img width="100px" src="{{ Storage::url($user->picture) }}" class="profile-img img-responsive white-bg">
											<h2 style="text-transform:capitalize;">{{ $user->name }}</h2>
											<div class="job-position" style="text-transform:uppercase;">
												{{ $user->roles->pluck('name')->implode(', ') }}
											</div>
											
											<ul class="contact-details">
												<li>
													<i class="fa fa-calendar"></i>
													{{ $user->created_at }}
												</li>
												<li>
													<i class="fa fa-envelope"></i>
													{{ $user->email }}
												</li>
											</ul>
										</div>

										<div class="profile-box-footer clearfix">
											<button style="background: transparent; border:none; width: 0px;  margin-left: 30px;" >
												<a href="" class="table-link danger">
													<span class="value">
														<i class="fa fa-envelope"></i>
													</span>
												</a>
											</button>

											<button style="background: transparent; border:none; width: 0px; margin-left: 180px; ">
												<a href="{{ route('usuarios.edit', $user->id) }}" class="table-link danger">
													<span class="value">
														<i class="fa fa-pencil"></i>
													</span>
												</a>
											</button>

											<form style="display: inline; margin-right: 70px" class="pull-right" method="POST" action="{{ route('usuarios.destroy', $user->id) }}">
												{!! method_field('DELETE') !!}
												{!! csrf_field() !!}
										
												<button type="submit" style="background: transparent; border:none; width: 0px">
													<a href="#" class="table-link danger">
														<span class="value">
															<i class="fa fa-trash"></i>
														</span>
													</a>
												</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{asset('plugins/components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('plugins/components/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
@stop
