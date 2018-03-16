@extends('layout')

@section('header')
	<ol class="breadcrumb">
		<li><a href="/">Inicio</a></li>
		<li class="active"><span>Pagos</span></li>
	</ol>
@stop
@section('title')
	<i class="fa fa-dollar"></i>
	Pagos
@stop

@section('button')
	<div class="filter-block pull-right col-lg-5 col-md-5 col-sm-5 col-xs-12">
		@include('payments.search')
	</div>
	<div align="center">
		{!! $payments->links() !!}
	</div>
@stop

@section('content')
	@foreach($clients as $client) 
		<div class="row">
			<header style="text-transform: capitalize; font-size: 20px; color:#4ac3be">
				{{ $client->name }}
			</header>
			<table class="table">
				<thead>
					<tr>
						<th><span>Cliente</span></th>
						<th><span>Vendido</span></th>
						<th><span>Comisión</span></th>
						<th><span>Pagar</span></th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							@foreach($products as $product) 
								{{ $product->code }}
							@endforeach
						</td>
						<td class="text-right">
						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td class="text-right"><strong> TOTAL:</strong></td>
						<td style="font-size: 20px" class="text-right">
							&dollar;
							<input type="text" id="sum" name="sum" class="form-control" readonly="readonly">
						</td>
						<td>&nbsp;</td>
					</tr>
				</tfoot>
			</table>
		</div>
	@endforeach
@stop
