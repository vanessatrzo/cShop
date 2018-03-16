@extends('layout')

@section('header')
	<ol class="breadcrumb">
		<li><a href="/">Inicio</a></li>
		<li><a href="{{ route('articulos.index') }}"><span>Inventario</span></a></li>
		<li class="active"><span>Nuevo</span></li>
	</ol>
@stop
@section('title')
	<i class="fa fa-user"></i>
	Nuevo ingreso
@stop

@section('button')
	<div class="filter-block pull-right">
		<a href="#" class="btn btn-primary pull-right">
			<i class="fa fa-plus-circle fa-lg"></i> Create invoice
		</a>

		<a href="#" class="btn btn-primary pull-right">
			<i class="fa fa-pencil fa-lg"></i> Edit invoice
		</a>
	</div>
@stop

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="main-box clearfix">

				<div class="main-box-body clearfix">
					<div id="invoice-companies" class="row">
						<div class="col-sm-4 invoice-box">
					
					<div class="form-group form-group-select2">
						<h2 class="pull-left">Código de cliente</h2> &nbsp;
						<div style="text-transform:uppercase">
						<select style="text-transform:uppercase; width:300px" id="sel2">
							@foreach($clients as $client)
								<option style="text-transform:uppercase" value="{{ $client->code }}">
									{{ $client->code }}
								</option>
							@endforeach
						</select>
						</div>
					</div>
						</div>
						<div class="col-sm-4 invoice-box">
							<div class="invoice-icon hidden-sm">
								<i class="fa fa-truck"></i> To
							</div>
							<div class="invoice-company">
								<h4>Robert Downey Jr.</h4>
								<p>
									10880 Malibu Point,<br/>
									Malibu, Calif., 90265<br/>
									USA
								</p>
							</div>
						</div>
						<div class="col-sm-4 invoice-box invoice-box-dates">
							<div class="invoice-dates">
								<div class="invoice-number clearfix">
									<strong>Cliente no.</strong>
									<span class="pull-right">20140566</span>
								</div>
								<div class="invoice-date clearfix">
									<strong>Fecha de ingreso:</strong>
									<span class="pull-right"><span class="pull-right">12/05/2014</span>
								</div>
								<div class="invoice-date invoice-due-date clearfix">
									<strong>Fecha de vencimiento:</strong>
									<span class="pull-right">12/05/2014</span>
								</div>
							</div>
						</div>
					</div>

					<form role="form" method="POST" 
										action="{{ route('articulos.store') }}"
									  	enctype="multipart/form-data">

						@include('products.form', ['product' => new App\Product])

						<input class="btn btn-primary pull-right" type="submit" value="Agregar">
					</form>
					<br>
					<hr>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th class="text-center"><span>#</span></th>
									<th><span>Nombre</span></th>
									<th class="text-center"><span>Código</span></th>
									<th class="text-center"><span>Cantidad</span></th>
									<th class="text-center"><span>Imágen</span></th>
									<th class="text-center"><span>Precio</span></th>
									<th class="text-center"><span>Total</span></th>
								</tr>
							</thead>
							<tbody>
								@foreach($products as $product)
									<tr>
										<td>
											{{ $product->code }}{{ $product->id }}
										</td>
										<td>
											{{ $product->name }}
										</td>
										<td class="text-center">
											<div>
												<img id="barcode1" width="30%" />
												<script>JsBarcode("#barcode1", "{{ $product->code }}{{ $product->id }}");</script>
											</div>
										</td>
										<td>
											{{ $product->id }}
										</td>
										<td class="text-center">
											<img width="50px" src="{{ Storage::url($product->picture) }}">
										</td>
										<td class="text-center">
											&dollar; {{ $product->price }}
										</td>
										<td class="text-center">
											&dollar; {{ $product->price }}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>

					<div class="invoice-box-total clearfix">
						<div class="row">
							<div class="col-sm-9 col-md-10 col-xs-6 text-right invoice-box-total-label">
								Subtotal
							</div>
							<div class="col-sm-3 col-md-2 col-xs-6 text-right invoice-box-total-value">
								&dollar; 7125.76
							</div>
						</div>
						<div class="row">
							<div class="col-sm-9 col-md-10 col-xs-6 text-right invoice-box-total-label">
								Ganancia (20%)
							</div>
							<div class="col-sm-3 col-md-2 col-xs-6 text-right invoice-box-total-value">
								&dollar; 1425.15
							</div>
						</div>
						<div class="row grand-total">
							<div class="col-sm-9 col-md-10 col-xs-6 text-right invoice-box-total-label">
								Total
							</div>
							<div class="col-sm-3 col-md-2 col-xs-6 text-right invoice-box-total-value">
								&dollar; 8550.91
							</div>
						</div>
					</div>
					<br>
					<div class="clearfix">
						<a href="#" class="btn btn-success pull-right">
							<i class="fa fa-mail-forward fa-lg"></i> Send invoice
						</a>
					</div>

				</div>
			</div>
		</div>
	</div>
    <div id="imprimeme">
      <div align="center">
		<img id="barcode1"/>
		<script>
			JsBarcode("#barcode1", "MERPLVTG",{
				displayValue:true,
				fontSize:15
			});
		</script>
	</div>
    </div>
    <button onclick="imprimir();">
  IMPRIMIR
</button>

<script>
	function imprimir(){
  var objeto=document.getElementById('imprimeme');  //obtenemos el objeto a imprimir
  var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
  ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
  ventana.document.close();  //cerramos el documento
  ventana.print();  //imprimimos la ventana
  ventana.close();  //cerramos la ventana
}
</script>

@stop
