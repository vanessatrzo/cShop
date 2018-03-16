<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Bazar de la esquina</title>

		<link rel="stylesheet" type="text/css" href="{{asset('plugins/components/bootstrap/dist/css/bootstrap.min.css')}}" />

		<script src="{{asset('plugins/js/demo-rtl.js')}}"></script>

		<link rel="stylesheet" type="text/css" href="{{asset('plugins/components/font-awesome/css/font-awesome.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('plugins/css/libs/nanoscroller.css')}}" />

		<link rel="stylesheet" type="text/css" href="{{asset('plugins/css/compiled/theme_styles.css')}}" />

		<link href='{{asset('plugins///fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400')}}' rel='stylesheet' type='text/css'>

		<link type="image/x-icon" href="{{asset('plugins/favicon.png')}}" rel="shortcut icon"/>

	</head>
	<body id="login-page-full">
		<div id="login-full-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div id="login-box">
							<div id="login-box-holder">
								<div class="row">
									<div class="col-xs-12">
										<header id="login-header">
											<div id="login-logo">
												<img src="plugins/img/logo.png" alt=""/>
											</div>
										</header>
										<div id="login-box-inner">
											<form align="center" role="form" method="POST" action="{{ route('register') }}">
											{!! csrf_field() !!}

											<div class="input-group" style="margin: 5px">
												<span class="input-group-addon"><i class="fa fa-user" style="width: 20px"></i></span>
												<input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Nombre">
											</div>
											<div class="input-group" style="margin: 5px">
												<span class="input-group-addon"><i class="fa fa-envelope" style="width: 20px"></i></span>
												<input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
											</div>
											<div class="input-group" style="margin: 5px" for="password">
												<span class="input-group-addon"><i class="fa fa-lock" style="width: 20px"></i></span>
												<input type="password" class="form-control" name="password" placeholder="Contraseña">
											</div>
											<div class="input-group" style="margin: 5px" for="password_confirmation">
												<span class="input-group-addon"><i class="fa fa-lock" style="width: 20px"></i></span>
												<input type="password" class="form-control" name="password_confirmation" placeholder="Confirme contraseña">
											</div>
											
											<hr>

											<div class="row" style="margin-top: 10px">
												<div class="col-xs-3"></div>
												<div class="col-xs-6">
													<button type="submit" class="btn btn-success col-xs-12">Guardar</button>
												</div>
												<div class="col-xs-3"></div>
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
		</div>

		

		<!-- global scripts -->
		<script src="{{asset('plugins/js/demo-skin-changer.js')}}"></script> <!-- only for demo -->

		<script src="{{asset('plugins/components/jquery/dist/jquery.min.js')}}"></script>
		<script src="{{asset('plugins/components/bootstrap/dist/js/bootstrap.js')}}"></script>
		<script src="{{asset('plugins/components/nanoscroller/bin/javascripts/jquery.nanoscroller.min.js')}}"></script>

		<script src="{{asset('plugins/js/demo.js')}}"></script> <!-- only for demo -->

		<!-- this page specific scripts -->


		<!-- theme scripts -->
		<script src="{{asset('plugins/js/scripts.js')}}"></script>

		<!-- this page specific inline scripts -->

	</body>
</html>