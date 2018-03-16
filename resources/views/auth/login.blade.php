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
												<img style="width: 100px; height: 80px" src="plugins/img/logob.png" alt=""/>
											</div>
										</header>
										<div id="login-box-inner">
											<form method="POST" action="/login">
												{!! csrf_field() !!}
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-user"></i></span>
													<input class="form-control" type="text" name="name" placeholder="Usuario">
												</div>
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-key"></i></span>
													<input type="password" class="form-control" name="password" placeholder="Contraseña">
												</div>
												<div id="remember-me-wrapper">
													<div class="row">
														<div class="col-xs-6">
															<div class="checkbox-nice">
																<input type="checkbox" id="remember-me" checked="checked" />
																<label for="remember-me">
																	Recordarme
																</label>
															</div>
														</div>
														<a href="forgot-password-full.html" id="login-forget-link" class="col-xs-6">
															¿Olvidaste tu contraseña?
														</a>
													</div>
												</div>
												<div class="row">
													<div class="col-xs-12">
														<button type="submit" class="btn btn-success col-xs-12">Entrar</button>
													</div>
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