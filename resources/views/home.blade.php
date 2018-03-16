@extends('layout')

@section('title')
    <i class="fa fa-home"></i>
    Inicio
@stop

@section('content')
	<div class="row">
		<div class="col-lg-3 col-sm-6 col-xs-12">
			<div class="main-box infographic-box colored green-bg">
				<i class="fa fa-barcode"></i>
				<span class="headline">Artículos</span>
				<span class="value">{{ $products_count }}</span>
			</div>
		</div>

		<div class="col-lg-3 col-sm-6 col-xs-12">
			<div class="main-box infographic-box colored emerald-bg">
				<i class="fa fa-users"></i>
				<span class="headline">Clientes</span>
				<span class="value">{{ $clients_count }}</span>
			</div>
		</div>

		<div class="col-lg-3 col-sm-6 col-xs-12">
			<div class="main-box infographic-box colored purple-bg">
				<i class="fa fa-user"></i>
				<span class="headline">Usuarios</span>
				<span class="value">{{ $users_count }}</span>
			</div>
		</div>

		{{-- <div class="col-lg-3 col-sm-6 col-xs-12">
			<div class="main-box infographic-box colored purple-bg">
				<i class="fa fa-globe"></i>
				<span class="headline">Visits</span>
				<span class="value">13.298</span>
			</div>
		</div> --}}
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="main-box">
				<header class="main-box-header">
					<h2>Artículos</h2>
				</header>

				<div class="main-box-body">
					<div id="gallery-photos-lightbox">
						<ul class="clearfix gallery-photos">
							{{-- @foreach($products as $product) --}}
							<li class="col-md-3 col-sm-3 col-xs-6">
								<a href="{{asset('plugins/img/samples/hdr/img_8.jpg')}}" class="photo-box image-link" style="background-image: url('{{asset('plugins/img/samples/hdr/small/img_8.jpg')}}');"></a>
								<span class="thumb-meta-time"><i class="fa fa-clock-o"></i> 23 minutes ago</span>
							</li>
							{{-- @endforeach --}}
							<li class="col-md-3 col-sm-3 col-xs-6">
								<a href="{{asset('plugins/img/samples/hdr/img_2.jpg')}}" class="photo-box image-link" style="background-image: url('{{asset('plugins/img/samples/hdr/small/img_2.jpg')}}');"></a>
								<span class="thumb-meta-time"><i class="fa fa-clock-o"></i> 23 minutes ago</span>
							</li>
							<li class="col-md-3 col-sm-3 col-xs-6">
								<a href="{{asset('plugins/img/samples/hdr/img_3.jpg')}}" class="photo-box image-link" style="background-image: url('{{asset('plugins/img/samples/hdr/small/img_3.jpg')}}');"></a>
								<span class="thumb-meta-time"><i class="fa fa-clock-o"></i> 23 minutes ago</span>
							</li>
							<li class="col-md-3 col-sm-3 col-xs-6">
								<a href="{{asset('plugins/img/samples/hdr/img_4.jpg')}}" class="photo-box image-link" style="background-image: url('{{asset('plugins/img/samples/hdr/small/img_4.jpg')}}');"></a>
								<span class="thumb-meta-time"><i class="fa fa-clock-o"></i> 23 minutes ago</span>
							</li>
							<li class="col-md-3 col-sm-3 col-xs-6">
								<a href="{{asset('plugins/img/samples/hdr/img_5.jpg')}}" class="photo-box image-link" style="background-image: url('{{asset('plugins/img/samples/hdr/small/img_5.jpg')}}');"></a>
								<span class="thumb-meta-time"><i class="fa fa-clock-o"></i> 23 minutes ago</span>
							</li>
							<li class="col-md-3 col-sm-3 col-xs-6">
								<a href="{{asset('plugins/img/samples/hdr/img_6.jpg')}}" class="photo-box image-link" style="background-image: url('{{asset('plugins/img/samples/hdr/small/img_6.jpg')}}');"></a>
								<span class="thumb-meta-time"><i class="fa fa-clock-o"></i> 23 minutes ago</span>
							</li>
							<li class="col-md-3 col-sm-3 col-xs-6">
								<a href="{{asset('plugins/img/samples/hdr/img_7.jpg')}}" class="photo-box image-link" style="background-image: url('{{asset('plugins/img/samples/hdr/small/img_7.jpg')}}');"></a>
								<span class="thumb-meta-time"><i class="fa fa-clock-o"></i> 23 minutes ago</span>
							</li>
							<li class="col-md-3 col-sm-3 col-xs-6">
								<a href="{{asset('plugins/img/samples/hdr/img_1.jpg')}}" class="photo-box image-link" style="background-image: url('{{asset('plugins/img/samples/hdr/small/img_1.jpg')}}');"></a>
								<span class="thumb-meta-time"><i class="fa fa-clock-o"></i> 23 minutes ago</span>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
	<script src="{{asset('plugins/js/jquery-ui.custom.min.js')}}"></script>
<script src="{{asset('plugins/components/dropzone/dist/min/dropzone.min.js')}}"></script>

@stop