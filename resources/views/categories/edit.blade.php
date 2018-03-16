@extends ('layout')
@section('header')
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="#">Inicio</a></li>
			<li><a href="{{ route('categorias.index') }}"><span>Categorías</span></a></li>
			<li class="active"><span>Editar</span></li>
		</ol>

		<h1>Editar categoría</h1>
	</div>
</div>
@stop
@section ('content')
	<div style="width: 50%;margin: 0px 50px 0px 200px;padding: 0 1em;border-radius: 3px;">
		<div class="row">
			<div class="col-xs-12">
				<div id="login-box-inner">
					@if (count($errors)>0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
					@endif

					{!!Form::model($category,['method'=>'PATCH','route'=>['categorias.update',$category->id]])!!}

						@include('categories.form')

						<div class="form-group pull-right">
							<button class="btn btn-primary" type="submit">Actualizar</button>
						</div>

					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
@endsection