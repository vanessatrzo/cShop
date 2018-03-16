<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Bazar de la esquina</title>

		@include('ss.styles')
	</head>

	<body>
<div style="width: 100%;padding: 0 1em;border-radius: 3px;">
	<div class="row">
		<div class="col-xs-12">
			<div id="login-box-inner">

				{!!Form::open(array('url'=>'compras','method'=>'POST','autocomplete'=>'off'))!!}
				{{Form::token()}}

				<div class="row">
					<div class="panel panel-primary">
						<div class="panel-body">
							<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
								<div class="form-group">
									<label>Artículo</label>
									<select name="pid" class="form-control selectpicker" id="pid" data-live-search="true">
										@foreach($products as $product)
										<option value="{{ $product->id }}_{{ $product->quantity }}_{{ $product->price }}">
											{{ $product->name }}
										</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
								<div class="form-group">
									<label for="quantity">Cantidad</label>
									<input type="number" name="pquantity" id="pquantity" class="form-control" placeholder="Cantidad">
								</div>
							</div>
							<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
								<div class="form-group">
									<label for="stock">Stock</label>
									<input type="number" disabled name="pstock" id="pstock" class="form-control" placeholder="Stock">
								</div>
							</div>
							<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
								<div class="form-group">
									<label for="price">Precio</label>
									<input type="number" disabled name="pprice" id="pprice" class="form-control" placeholder="Precio">
								</div>
							</div>

							<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
								<div class="form-group">
									<button type="button" id="bt_add" class="btn btn-primary">
										Agregar
									</button>
								</div>
							</div>

							<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
								<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
									<thead>
										<th>Opciones</th>
										<th>Artículo</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>Subtotal</th>
									</thead>
									<tfoot>
										<th>TOTAL</th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th>
											<h4 id="total">S/. 0.00</h4>
											<input type="hidden" name="total_venta" id="total_venta">
										</th>
									</tfoot>
									<tbody>
										
									</tbody>
								</table>
							</div>							
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
						<div class="form-group">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button class="btn btn-primary" type="submit">Guardar</button>
							<button class="btn btn-danger" type="reset">Cancelar</button>
						</div>
					</div>
				</div>
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('bt_add').click(function(){
			agregar();
		});
	});

	var cont=0;
	total=0;
	subtotal=[];
	$("#guardar").hide();
	$("#pid").change(mostrarValores);

	function mostrarValores(){
		datosArticulo = document.getElementById('pid').value.split('_');
		$("#pprice").val(datosArticulo[2]);
		$("#pquantity").val(datosArticulo[1]);
	}

	function agregar(){
		datosArticulo = document.getElementById('pid').value.split('_');

		id=datosArticulo[0];
		name=$("pid option:selected").text();
		quantity=$("pquantity").val();
		price=$("pprice").val();
		stock=$("pstock").val();

		if (id!="" && quantity!="" && quantity>0 && price!="") {
			if (stock>=quantity) {
				subtotal[cont]=(quantity*price);
				total=total+subtotal[cont];

				var fila = 
					'<tr class="selected" id="fila'+ cont +'">' + 
						'<td>' + 
							'<button type="button" class="btn btn-warning" onclick="eliminar('+ 
					cont+');">X</button></td><td><input type="hidden" name"id[]" value="'+
					id+'">' + name + '</td><td><input type="number" name="price[]" value="' +
					price + '"></td><td>' +
					subtotal[cont] + '</td></tr>';
				cont++;
				limpiar();
				$("#total").html("S/." + total);
				$("#total_venta").val(total);
				evaluar();
				$('#detalles').append(fila);
			}
			else{
				alert('La cantidad a vender supera el stock');
			}
		}
		else{
			alert("Error al ingresar el detalle de la venta, revise los datos");
		}

		function limpiar(){
			$("#pquantity").val("");
			$("#pprice").val("");
		}

		function evaluar(){
			if (total>0) {
				$("#guardar").show();
			}
			else{
				$("#guardar").hide();
			}
		}

		function eliminar(index){
			total=total-subtotal[index];
			$("#total").html("S/." + total);
			$("#total_venta").val(total);
			$("#fila" + index).remove();
			evaluar();
		}

	}
</script>
</body>
</html>