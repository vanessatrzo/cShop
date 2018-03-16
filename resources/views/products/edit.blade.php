@extends('layout')

@section('header')
	<ol class="breadcrumb">
		<li><a href="/">Inicio</a></li>
		<li><a href="{{ route('articulos.index') }}"><span>Inventario</span></a></li>
		<li class="active"><span>Editar</span></li>
	</ol>
@stop

@section('title')
	<i class="fa fa-hashtag"></i>
	Editar artículo
@stop

@section('content')
	<div style="width: 100%;padding: 0 1em;border-radius: 3px;">
		<div class="row">
			<div class="col-xs-12">
				<div id="login-box-inner">

					<form role="form" method="POST" action="{{ route('articulos.update', $product->id) }}" enctype="multipart/form-data">
					{!! method_field('PUT') !!}
					
						@include('products.form')

						<div align="right">
							<button type="submit" class="btn btn-primary">Actualizar</button>
						</div>
						
					</form>

				</div>
			</div>
		</div>
	</div>
@stop