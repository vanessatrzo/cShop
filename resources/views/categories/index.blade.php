@extends('layout')

@section('header')
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="/">Inicio</a></li>
			<li class="active"><span>Categorías</span></li>
		</ol>

		<h1>Categorías</h1>
	</div>
</div>
@stop

@section('button')
<div class="filter-block pull-right col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<a href="{{ route('categorias.create') }}" class="btn btn-primary pull-right btn-lg">
		<i class="fa fa-plus fa-lg"></i>
	</a>
	<div class="filter-block pull-right col-lg-5 col-md-5 col-sm-5 col-xs-12">
		@include('categories.search')
	</div>
</div>

@stop 
@section('content')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>&nbsp;</th>
				</thead>
               @foreach ($categories as $cat)
				<tr>
					<td>{{ $cat->name}}</td>
					<td>{{ $cat->description}}</td>
					<td>
						<form style="display: inline;" method="POST" action="{{ route('categorias.destroy', $cat->id) }}">
							{!! method_field('DELETE') !!}
							{!! csrf_field() !!}

							<a href="{{URL::action('CategoriesController@edit',$cat->id)}}">
								<button type="button" class="btn btn-info">
									<i class="fa fa-pencil"></i>
								</button>
							</a>
							<a href="" >
	                         	<button type="submit" class="btn btn-danger">
	                         		<i class="fa fa-trash"></i>
	                         	</button>
	                        </a>
						</form>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		<div align="center">
			{{$categories->render()}}
		</div>
	</div>
</div>
@stop