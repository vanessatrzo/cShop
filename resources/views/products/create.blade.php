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
Nuevo artículo
@stop

@section('content')
<div style="width: 100%;padding: 0 1em;border-radius: 3px;">
	<div class="row">
		<div class="col-xs-12">
			<div id="login-box-inner">

				@include('products.form', ['product' => new App\Product])

				<button type="submit" class="btn btn-primary" id="add" onclick="generarTotal()">Agregar</button>
				
				<hr style="border: 1px solid #03a9f4; border-radius: 200px /8px; height: 0px; text-align: center;">
				<table class="table user-list table-hover">
						<thead>
							<tr>
								<th><span>Artículo</span></th>
								<th><span>Código</span></th>
								<th><span>&nbsp;</span></th>
								<th><span>Categoría</span></th>
								<th><span>Cantidad</span></th>
								<th><span>Precio</span></th>
								<th><span>Subtotal</span></th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $product)
							<tr>
								<td>
									<img width="100px" src="{{ Storage::url($product->picture) }}">
									<a  style="text-transform: capitalize;" href="{{ $product->id }}" class="user-link">{{ $product->name }}</a>
									<span class="user-subhead"  style="text-transform: uppercase;">
										{{ $product->code}}
									</span>
								</td>
								<td>
									<img  style="text-transform: uppercase;" id="barcode1" width="80%">
									<script style="text-transform: uppercase;">
										JsBarcode("#barcode1", "{{ $product->code }}");
									</script>
								</td>
								<td>
									<div id="imprimeme" align="center" style="display: none">
										<img  style="text-transform: uppercase;" id="barcode2" width="40%">
										<canvas height="400px" width="300px" id="price"></canvas>
 
										<script>
											var canvas = document.getElementById("price");
											var ctx = canvas.getContext("2d");
											ctx.font = "150px Arial";
											ctx.fillText("${{ $product->price }}",30,120);
										</script>
										<script style="text-transform: uppercase;">
											JsBarcode("#barcode2", "{{ $product->code }}");
										</script>
										
									</div>
								</td>
								<td>
									{{ $product->category }}
								</td>
								<td id="cant">
									{{ $product->quantity }}
								</td>
								<td id="precio">{{ $product->price }}</td>
								<td class="subTotal">{{ $product->subtotal }}</td>
								<td style="width: 20%;">
										{{-- <a href="#modal-11{{$product->id}}" class="table-link">
											<span class="fa-stack">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
											</span>
										</a> --}}
										<form style="display: inline;" method="POST" action="{{ route('articulos.destroy', $product->id) }}">
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
												<button type="button" onclick="imprimir();" class="btn btn-info">
									  <i class="fa fa-print"></i>
									</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>

					<hr>
{{-- 
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="igv">Ganancia:</label>
							<input type="text" class="form-control"disabled id="igv">
						</div>
						<div class="form-group  col-sm-4">
							<label for="total">Total:</label>
							<input type="text" class="form-control" disabled id="total">
						</div>

					</div> --}}
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