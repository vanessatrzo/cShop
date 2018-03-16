<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Bazar de la esquina</title>

		@include('ss.styles')
	</head>

	<body>
		<script src="{{asset('plugins/https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js')}}"></script>
		<link rel="stylesheet" href="{{asset('plugins/https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')}}" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<div class="row" style="margin: 20px">
			<div class="col-lg-8">
				<div class="main-box">
					<header class="main-box-header clearfix">
						<h2>
							<span><i class="fa fa-shopping-cart"></i></span>
							Compras
						</h2>
						<div class="filter-block pull-right col-lg-5 col-md-5 col-sm-5 col-xs-12">
				    		
				    	</div>
					</header>

					<div class="main-box-body clearfix">
						<div class="container">
							@include('sales.search')
							
							
							{{-- <table id="idsecond" class="table table-bordered table-hover">
								<thead bgcolor="skyblue">
									<tr>
										<th>#</th>
										<th>Articulo</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>Accion</th>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
									<tr>
										<td id="code">{{ $product->code }}</td>
										<td id="name">{{ $product->name }}</td>
										<td id="quantity">{{ $product->quantity }}</td>
										<td id="price">{{ $product->price }}</td>
										<td id=""><button class="a">Agregar</button></td>
									</tr>
									@endforeach
								</tbody>
							</table> --}}

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
									@foreach($products as $product)
									<tr>
										<td id="code">{{ $product->code }}</td>
										<td id="name">{{ $product->name }}</td>
										<td id="stock">{{ $product->quantity }}</td>
										<td id="price">{{ $product->price }}</td>
										<td id="quantity">
											<input type='number' placeholder='Ingresar cantidad'/>
										</td>
										<td>
											<p class='subTotal'></p>
										</td>
										<td>
											<input type='button' class='btneli' id='idbotoneli' value='Eliminar'>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>

							<hr>

							<div class="row">
								<div class="form-group col-sm-4">
									<label for="igv">Ganancia:</label>
									<input type="text" class="form-control" disabled id="igv">
								</div>
								<div class="form-group  col-sm-4">
									<label for="total">Total:</label>
									<input type="text" class="form-control" disabled id="total">
								</div>
								<div class="col-sm-4">
									<button id="save" type="submit" class="btn btn-primary col-xs-12">
										Guardar
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="main-box">
					<header class="main-box-header clearfix">
						<h2>
							<span><i class="fa fa-camera"></i></span>
							Artículo
						</h2>
					</header>

					<div class="main-box-body clearfix" align="center">
						{{-- <img width="250px" src="{{ Storage::url($product->picture) }}"> --}}
					</div>
				</div>
				<div align="center">
					<form action="/">
						<button class="btn btn-primary btn-large"><i class="fa fa-home fa-lg"></i></button>
					</form>
				</div>
			</div>
		</div>

		<input type="text" id="ingreso" name="delay" autofocus>

		@include('ss.scripts')

		<script src="{{asset('plugins/https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js')}}"></script>
		<script>
			var codigo="";
			$.fn.delayPasteKeyUp = function(fn, ms)
			{
				var timer = 0;
				$("#search-code").on("propertychange input", function()
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
				$('.a').on('click', function(){
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
					trPrincipal.style.display = "none"; //Ocultamos el TR de la Primer Tabla
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
			<script>
	$(function() {
		$('.chart').easyPieChart({
			easing: 'easeOutBounce',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			},
			barColor: '#3498db',
			trackColor: '#f2f2f2',
			scaleColor: false,
			lineWidth: 8,
			size: 130,
			animate: 1500
		});
	});
</script>

<script>
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
		var igv = 0.25; //AQUI se coloca el iva que deseas calcular, par este efecto he puesto el 18%. 
		var b = document.getElementById("igv"); // Buscamos el campo con Id igv
		var operacion = Number(a.value) * igv; // calculamos el IGV
		b.value = operacion.toFixed(2); // Le asignamos al campo con Id igv el IVA mediante la propiedad value.
	}
</script>

<script>
	$(document).ready(function(){

		var $save = document.getElementById("save"),
			$code = document.getElementById("code"),
			$name = document.getElementById("name"),
			$quantity = document.getElementById("quantity"),
			$price = document.getElementById("price"),
			$total = document.getElementById("total");

		$save.addEventListener("click", function(){
			// $.ajaxSetup({
			//  	headers: {
			//  		'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			//  	}
			// });
			
			$.ajax({
				type: "POST",
				url: "/compras",
				data: JSON.stringify({
					"_token": $('meta[name="_token"]').attr('content'),
					"code": $code.value,
					"name": $name.value,
					"quantity": $quantity.value,
					"price": $price.value,
					"total": $total.value
				}),
				processData: false,
				cache: false,
				dataType: "json",
				contentType:"application/json; charset=utf-8",
				success: function (result) {
					alert("si");
				   	//('#vane').html(result);
				    }
			});
		});
	});
</script>
	</body>
</html>