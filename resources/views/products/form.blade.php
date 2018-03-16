{!! csrf_field() !!}

<div class="col-lg-12">
	<div>
		<label class="pull-left" style="margin-top: 5px; margin-right: 20px">
			Cliente
		</label>

		<div style="text-transform:capitalize;">
			<select class="caja" style="text-transform:capitalize; width:300px" name="code" id="code">
				@foreach($clients as $client)
					<option style="text-transform:capitalize;" value="{{ $client->code }}">
						{{ $client->name }}
					</option>
				@endforeach
			</select>
		</div>

		{!! $errors->first('code', '<span class="error">:message</span>') !!}
	</div>

	<br>

	<div class="col-lg-2">		
		<div align="center">
			<canvas id="canvas" name="picture" style="width:150px"></canvas>
		</div>
		<p id="estado" style="display: none"></p>
		<div align="center">
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
				<i class="fa fa-camera" style="width: 20px"></i>
			</button>
		</div>

		@include('products.modal')

	</div>

	<div class="col-lg-10">
		<div class="form-group col-xs-4">
			<label>Nombre</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ $product->name or old('name') }}">
			{!! $errors->first('name', '<span class="error">:message</span>') !!}
		</div>

		<div class="form-group col-xs-5">
			<label>Descripción</label>
			<input type="text" name="description" id="description" class="form-control" value="{{ $product->description or old('description') }}">
			{!! $errors->first('description', '<span class="error">:message</span>') !!}
		</div>

		<div class="form-group col-xs-2" style="width: 10%">
			<label>Cantidad</label>
			<input type="number" name="quantity" id="quantity" min="0" class="form-control" value="{{ $product->quantity or old('quantity') }}">
			{!! $errors->first('quantity', '<span class="error">:message</span>') !!}
		</div>

		<div class="form-group col-xs-2" style="width: 12%">
			<label>Precio</label>
			<input type="text" name="price" id="price" class="form-control" value="{{ $product->price or old('price') }}">
			{!! $errors->first('price', '<span class="error">:message</span>') !!}
		</div>

		<div class="form-group col-xs-2" style="margin-right: 80px;">
			<label>Categoría</label>
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
		</div>

		<div class="form-group col-xs-3" style="margin-right: 80px;">
			<label>Ubicación</label>
			<div style="text-transform:capitalize;">
				<select class="caja" style="text-transform:capitalize;; width:200px" name="ubication" id="ubication">
					@foreach($ubications as $ubication)
						<option style="text-transform:capitalize;" value="{{ $ubication->name }}">
							{{ $ubication->name }}
						</option>
					@endforeach
				</select>
			</div>
			{!! $errors->first('ubication', '<span class="error">:message</span>') !!}
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		function tieneSoporteUserMedia() {
			return !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
		}

		function _getUserMedia() {
			return (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);
		}

		// Declaramos elementos del DOM
		var $video = document.getElementById("video"),
			$canvas = document.getElementById("canvas"),
			$startbutton = document.getElementById("startbutton"),
			$add = document.getElementById("add"),
			$estado = document.getElementById("estado");
			$code = document.getElementById("code");
			$name = document.getElementById("name");
			$category = document.getElementById("category");
			$description = document.getElementById("description");
			$quantity = document.getElementById("quantity");
			$price = document.getElementById("price");
			$category = document.getElementById("category");
			$ubication = document.getElementById("ubication");

		if (tieneSoporteUserMedia()) {
			_getUserMedia(
				{video: true}, function (stream) {
					console.log("Permiso concedido");
					video.srcObject = stream;
					$video.play();

					//Escuchar el click
					$startbutton.addEventListener("click", function(){

						//Pausar reproducción
						$video.pause();

						//Obtener contexto del canvas y dibujar sobre él
						var contexto = $canvas.getContext("2d");
						$canvas.width = $video.videoWidth;
						$canvas.height = $video.videoHeight;
						contexto.drawImage($video, 0, 0, $canvas.width, $canvas.height);
			
						//Reanudar reproducción
						$video.play();
					});

					$add.addEventListener("click", function(){
						var picture = $canvas.toDataURL(); //Esta es la foto, en base 64
						$estado.innerHTML = "Enviando foto. Por favor, espera...";
						 $.ajaxSetup({
						 	headers: {
						 		'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
						 	}
						 });
						$.ajax({
							type: "POST",
							url: "/articulos",
							data: JSON.stringify({
								"_token": $('meta[name="_token"]').attr('content'),
								"picture":picture,
								"name": $name.value,
								"code": $code.value,
								"category": $category.value,
								"description": $description.value,
								"quantity": $quantity.value,
								"price": $price.value,
								"quantity": $quantity.value,
								"ubication": $ubication.value
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
				}, 

				function (error) {
					console.log("Permiso denegado o error: ", error);
					$estado.innerHTML = "No se puede acceder a la cámara, o no diste permiso.";
				});
		} 
		else {
			alert("Lo siento. Tu navegador no soporta esta característica");
			$estado.innerHTML = "Intenta actualizarlo.";
		}
	});
</script>