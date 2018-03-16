@extends('layout')

@section('header')
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><a href="#">Inicio</a></li>
			<li class="active"><span>Artículos</span></li>
		</ol>

		<h1>Artículos</h1>
	</div>
</div>
@stop

@section('button')
	<div class="filter-block pull-right">
		<div class="form-group pull-left">
			<input type="text" class="form-control" placeholder="Search...">
			<i class="fa fa-search search-icon"></i>
		</div>

		<a href="#" class="btn btn-primary pull-right">
			<i class="fa fa-plus-circle fa-lg"></i> Add product
		</a>
	</div>
@stop
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="main-box clearfix">

				<div class="main-box-body clearfix">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th><a href="#"><span>Artículo</span></a></th>
									<th class="text-right"><a href="#" class="asc"><span>Precio</span></a></th>
									<th class="text-center"><span>Cantidad</span></th>
									<th class="text-center"><span>Estado</span></th>
									<th class="text-center"><a href="#" class="desc"><span>Fecha</span></a></th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<img src="{{asset('plugins/img/samples/ipad.png')}}" alt=""/>
										iPad Mini 32GB Wifi
									</td>
									<td class="text-right">
										&dollar; 625.50
									</td>
									<td class="text-center">
										<span class="label label-warning">Inactive</span>
									</td>
									<td class="text-center">
										<span class="label label-warning">Inactive</span>
									</td>
									<td class="text-center">
										2013/08/08 12:08
									</td>
									<td style="width: 15%;">
										<a href="#" class="table-link">
											<span class="fa-stack">
												<i class="fa fa-square fa-stack-2x"></i>
												<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
											</span>
										</a>
										<a href="#" class="table-link">
											<span class="fa-stack">
												<i class="fa fa-square fa-stack-2x"></i>
												<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
											</span>
										</a>
										<a href="#" class="table-link danger">
											<span class="fa-stack">
												<i class="fa fa-square fa-stack-2x"></i>
												<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
											</span>
										</a>
									</td>
								</tr>
								<tr>
									<td>
										MacBook Air 11"
									</td>
									<td class="text-right">
										&dollar; 999.00
									</td>
									<td class="text-center">
										<span class="label label-success">Active</span>
									</td>
									<td class="text-center">
										2013/08/08 12:08
									</td>
									<td style="width: 15%;">
										<a href="#" class="table-link">
											<span class="fa-stack">
												<i class="fa fa-square fa-stack-2x"></i>
												<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
											</span>
										</a>
										<a href="#" class="table-link">
											<span class="fa-stack">
												<i class="fa fa-square fa-stack-2x"></i>
												<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
											</span>
										</a>
										<a href="#" class="table-link danger">
											<span class="fa-stack">
												<i class="fa fa-square fa-stack-2x"></i>
												<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
											</span>
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<ul class="pagination pull-right">
						<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@stop
