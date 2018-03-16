@extends('layout')

@section('header')
<ol class="breadcrumb">
	<li><a href="/">Inicio</a></li>
	<li><a href="{{ route('articulos.index') }}"><span>Inventario</span></a></li>
	<li class="active"><span>Editar</span></li>
</ol>
@stop
@section('title')
<i class="fa fa-user"></i>
Nuevo artículo
@stop

@section('content')
<div style="width: 100%;padding: 0 1em;border-radius: 3px;">
	<div class="row">
		<div class="col-xs-12">
			<div id="login-box-inner">

				<form role="form" method="POST" action="{{ route('articulos.store') }}" enctype="multipart/form-data">
					
					<div>
						<label class="pull-left" style="margin-top: 5px; margin-right: 20px">Código de cliente</label>
						<div style="text-transform:capitalize;">
							<select class="caja" style="text-transform:capitalize; width:300px" name="code" id="code">
								@foreach($clients as $client)
								<option style="text-transform:capitalize;" value="{{ $client->code }}">
									{{ $client->code }}
								</option>
								@endforeach
							</select>
						</div>
						{!! $errors->first('code', '<span class="error">:message</span>') !!}
					</div>
					<table id="idsecond" class="table table-bordered table-hover">
						<thead bgcolor="skyblue">
							<tr>
								<th>Foto</th>
								<th>Articulo</th>
								<th>Descripción</th>
								<th>Cantidad</th>
								<th>Precio</th>
								<th>Categoría</th>
								<th>Accion</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $product)
							@endforeach
							<tr>
								<td>
									<div align="center">
										<div class="input-group" style="margin: 5px">
											<label for="picture">
												<input type="image" accept="image/*" name="picture" width="110px" src="{{ Storage::url($product->picture) }}" id="laimagen"/>
											</label>
											{!! $errors->first('picture', '<span class="error">:message</span>') !!}
										</div>
									</div><div align="center">
										<canvas id="canvas" style="display: none"></canvas>
									</div>
									<div align="center">
										<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-camera" style="width: 20px"></i>
										</button>
									</div>

									@include('products.modal')
								</td>
								<td>
									<input type="text" name="name" class="form-control" value="{{ $product->name or old('name') }}">
									{!! $errors->first('name', '<span class="error">:message</span>') !!}
								</td>
								<td>
									
									<input type="text" name="description" class="form-control" value="{{ $product->description or old('description') }}">
									{!! $errors->first('description', '<span class="error">:message</span>') !!}
								</td>
								<td>
									<input type="number" name="quantity" min="0" class="form-control" value="{{ $product->quantity or old('quantity') }}">
									{!! $errors->first('quantity', '<span class="error">:message</span>') !!}
								</td>
								<td>
									<input type="text" name="price" class="form-control" value="{{ $product->price or old('price') }}">
									{!! $errors->first('price', '<span class="error">:message</span>') !!}
								</td>
								<td>
									<div style="text-transform:capitalize;">
										<select class="caja" style="text-transform:capitalize;; width:200px" name="category" id="category">
											@foreach($categories as $category)
											<option style="text-transform:capitalize;" value="{{ $category->name }}">
												{{ $category->name }}
											</option>
											@endforeach
										</select>
									</div>
									{!! $errors->first('category', '<span class="error">:message</span>') !!}
								</td>
								<td><button type="button" class="a">Agregar</button></td>
							</tr>
						</tbody>
					</table>

					<div align="right">
						<button type="submit" class="btn btn-primary" id="add">Agregar</button>
					</div>

				</form>
				<hr style="border: 1px solid #03a9f4; border-radius: 200px /8px; height: 0px; text-align: center;">
				<div class="table-responsive">
					<table class="othertable col-xs-12 table-condensed table-hover table-bordered">
						<thead bgcolor="orange">
							<tr>
								<th>#</th>
								<th>Articulo</th>
								<th>Existencia</th>
								<th>Precio</th>
								<th>Cantidad</th>
								<th>SubTotal</th>
								<th>Accion</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>

					<hr>

					<div class="row">
						<div class="form-group col-sm-4">
							<label for="igv">Ganancia:</label>
							<input type="text" class="form-control"disabled id="igv">
						</div>
						<div class="form-group  col-sm-4">
							<label for="total">Total:</label>
							<input type="text" class="form-control" disabled id="total">
						</div>

					</div>
				</div>	
			</div>
		</div>
	</div>
</div>


 <script>
 	var select = document.getElementById('code');
 	select.addEventListener('change',
 		function(){
 			var selectedOption = this.options[select.selectedIndex];
 			document.getElementById("sel").value = (selectedOption.value);
 		});
 	</script>

 	<script>
 		var select = document.getElementById('category');
 		select.addEventListener('change',
 			function(){
 				var selectedOption = this.options[select.selectedIndex];
 				document.getElementById("selc").value = (selectedOption.value);
 			});
 		</script>
 		<script src="{{asset('plugins/https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js')}}"></script>
 		<script>
 			$.fn.delayPasteKeyUp = function(fn, ms)
 			{
 				var timer = 0;
 				$(this).on("propertychange input", function()
 				{
 					clearTimeout(timer);
 					timer = setTimeout(fn, ms);
 				});
 			};

				 //la utilizamos
				 $(document).ready(function()
				 {
				 	$("#ingreso").delayPasteKeyUp(function(){
				 		
				 		$("#respuesta").append($("#ingreso").val() +"<br>");
				 		$clone=$("#ingreso").clone();
				 		document.f1.f1t1.value = $clone.val();
				 		$("#ingreso").val("");
				 	}, 200);
				 });

				</script>

				<script>
					$(document).ready(function(){
						$("#add").on("click",function(){
							$clone=$("table tbody tr:first").clone();
							$clone.find("input").each(function(){
								$(this).val("");
							});
							$("table tbody").append($clone);
						});
					});

					$(document).on('click', '.borrar', function (event) {
						event.preventDefault();
						$(this).closest('tr').remove();
					});
					var suma = 0;
				$('#ratios tr.dato').each(function(){ //filas con clase 'dato', especifica una clase, asi no tomas el nombre de las columnas
				 suma += parseInt($(this).find('td').eq(1).text()||0,10) //numero de la celda 3
				})
				document.getElementById("sum").value = suma;
			</script>



			<script >
				$('.a').on('click',function(){
					var trPrincipal = this.offsetParent.parentElement; //Buscamos el TR principal
					// var firstName = trPrincipal.children[0].outerText; //Capturamos el FirstName
					var idproducto=trPrincipal.children[0].outerText;
					var nombreprod=trPrincipal.children[1].outerText;
					var cantidad=trPrincipal.children[2].outerText;
					var precio=trPrincipal.children[3].outerText;

					// var lastName = trPrincipal.children[1].outerText+' '+trPrincipal.children[2].outerText; //Capturamos el LastName

					$(".othertable").append("<tr><td>"+
						idproducto+"</td><td>"+
						nombreprod+"</td><td>"+
						cantidad+"</td><td>"+
						precio+
						"<td><input type='number' placeholder='Ingresar cantidad'/></td>" +
						"<td><p class='subTotal'></p></td>" +
						"<td><input type='button' class='btneli' id='idbotoneli' value='Eliminar'></td></tr>");
					//trPrincipal.style.display = "none"; //Ocultamos el TR de la Primer Tabla
					var btn_ = document.querySelectorAll(".btneli"); // Buscamos todos los elementos que tengan la clase .btneli
					for(var a in btn_){ //Iteramos la variable btn_
						var b = btn_[a];
						if(typeof b == "object"){ //Solo necesitamos los objetos
						  	b.onclick = function (){ //Asignamos evento click
							    var trBtn = this.offsetParent.parentElement; // buscamos el tr principal de la segunda tabla
							    var firstNameBtn = trBtn.children[0].outerText; //Capturamos el FirstName de la segunda tabla
							    trBtn.remove(); // eliminamos toda la fila de la segunda tabla
							    var tbl = document.querySelectorAll(".table td:first-child"); //Obtenemos todos los primeros elementos td de la primera tabla
							    for(var x in tbl){ //Iteramos los elementos obtenidos
							    	var y = tbl[x];
							      	if(typeof y == "object"){ //solo nos interesan los object
							        	if (y.outerText == firstNameBtn){ //comparamos el texto de la variable y vs el firstNameBtn
							           		var t = y.parentElement; //capturamos el elemento de la coincidencia
							          		t.style.display = ""; //actualizamos el estilo display dejándolo en vacío y esto mostrará nuevamente la fila tr de la primera tabla
							          	}
							          }
							      }
							  }
						} //Termina onclick
				  	}//Termina For
					//Emprezamos buscando todos los inputs tipo Number
					var a = document.querySelectorAll("input[type='number']");
					if(a != undefined || a != null){
						a.forEach(function (x){ //De todo el resultado iteramos con un Foreach
							var precio = Number(x.parentElement.previousSibling.textContent); // Localizamos el Precio dentro de la tabla
							x.onkeyup = function (){ //Asignamos un Metodo del teclado; 
					   			this.offsetParent.nextElementSibling.children[0].innerHTML = (precio * x.value); //Calculamos el subtotal y se lo agregamos en la columna
					   			generarTotal(); // Ejecutamos una funcion que se genera el Total
					   		}
						});//Foreach
				  	}//if

					function generarTotal(){ //Funcion que genera el total
						var a = document.querySelectorAll(".subTotal"); //Buscamos todos los subtotales
						if(a != undefined || a != null){
				  			var total = new Number(); //creamos variable tipo Number llamada Total
				  			a.forEach(function (x){ //Iteramos el array a que contiene los subtotales
				    			total += Number(x.textContent); // Vamos sumando todos los subtotales en la variable total
				    		});
				  			var t_ = document.getElementById("total"); //Buscamos el input que tiene Id: total
				  			t_.value = total.toFixed(2);  // le asignamos por la propiedad value el valos de todos los subtotales con 2 decimales
				  			generarIGV(); // Generamos el IVa General de las Ventas con la funcion generarIGV
				  		}
				  	}
					function generarIGV(){ //Funcion que calcula el IVA
						var a = document.getElementById("total"); //Buscamos el elemento Total para extraer el total de las ventas
						var igv = 0.2; //AQUI se coloca el iva que deseas calcular, par este efecto he puesto el 18%. 
						var b = document.getElementById("igv"); // Buscamos el campo con Id igv
						var operacion = Number(a.value) * igv; // calculamos el IGV
						b.value = operacion.toFixed(2); // Le asignamos al campo con Id igv el IVA mediante la propiedad value.
					}
				});
			</script>
@stop