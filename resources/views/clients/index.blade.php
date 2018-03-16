@extends('layout')

@section('header')
<ol class="breadcrumb">
	<li><a href="/">Inicio</a></li>
	<li class="active"><span>Clientes</span></li>
</ol>
@stop
@section('title')
<i class="fa fa-users"></i>
Clientes
@stop

@section('button')
<div class="pull-right col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<button class="md-trigger btn btn-primary btn-lg pull-right" data-modal="modal-11">
		<i class="fa fa-plus fa-lg"></i>
	</button>
	<div class="filter-block pull-right col-lg-5 col-md-5 col-sm-5 col-xs-12">
		@include('clients.search')
	</div>
</div>

@include('clients.modal-create')
@stop

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div align="center">
			{!! $clients->links() !!}
		</div>
		<div class="main-box no-header clearfix">
			<div class="main-box-body clearfix">
				<div class="table-responsive">
					<table class="table user-list table-hover">
						<thead>
							<tr>
								<th><span>Cliente</span></th>
								<th><span>Teléfono</span></th>
								<th><span>Celular</span></th>
								<th><span>Email</span></th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($clients as $client)
							<tr>
								<td>
									<img width="100px" src="{{ Storage::url($client->ife) }}">
									<a  style="text-transform: capitalize;" href="{{ $client->id }}" class="user-link">{{ $client->name }}</a>
									<span class="user-subhead"  style="text-transform: uppercase;">
										{{ $client->code}}
									</span>
								</td>
								<td>
									{{ $client->phone }}
								</td>
								<td>
									{{ $client->cell }}
								</td>
								<td>{{ $client->email }}</td>
								<td style="width: 20%;">
									
									<button type="button" style="background: transparent; border:none;" data-modal="modal-12{{$client->id}}" class="md-trigger">
										<a href="#" class="table-link">
											<span class="fa-stack">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-search fa-stack-1x fa-inverse"></i>
											</span>
										</a>
									</button>
									@include('clients.modal-show')
										{{-- <a href="#modal-11{{$client->id}}" class="table-link">
											<span class="fa-stack">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
											</span>
										</a> --}}
										<button type="button" style="background: transparent; border:none;" data-modal="modal-11{{$client->id}}" class="md-trigger">
											<a href="#" class="table-link">
												<span class="fa-stack">
													<i class="fa fa-circle fa-stack-2x"></i>
													<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
												</span>
											</button> 
											@include('clients.modal-edit')
											<form style="display: inline;" method="POST" action="{{ route('clientes.destroy', $client->id) }}">
												{!! method_field('DELETE') !!}
												{!! csrf_field() !!}

												
												<button type="submit" style="background: transparent; border:none;">
													<a href="#" class="table-link danger">
														<span class="fa-stack">
															<i class="fa fa-circle fa-stack-2x"></i>
															<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
														</span>
													</a>
												</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script src="{{asset('plugins/components/bootstrap-application-wizard-ocsp/demo/js/prettify.js')}}"></script>
<script src="{{asset('plugins/components/bootstrap-application-wizard-ocsp/dist/bootstrap-wizard.min.js')}}"></script>
<script src="{{asset('plugins/components/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('plugins/components-custom/modal-animations/modernizr.custom.js')}}"></script>
<script src="{{asset('plugins/components-custom/modal-animations//classie.js')}}"></script>
<script src="{{asset('plugins/components-custom/modal-animations//modalEffects.js')}}"></script>


		@stop
