{!! csrf_field() !!}
	
<div class="row col-xs-12">
	<div class="form-group col-xs-6">
		<label for="" class="pull-left">Nombre</label>
		<input type="text" style="text-transform:capitalize;" placeholder="Nombre completo" class="form-control" name="name" id="name" value="{{ $client->name or old('name') }}">
		{!! $errors->first('name', '<span class="error">:message</span>') !!}
	</div>
	<div class="form-group col-xs-1">
		<li style="color: #fff"></li>
		<button type="button" class="btn btn-info" onclick="gcode()">
			<i class="fa fa-arrow-right" style="width: 20px"></i>
		</button>
	</div>
	<div class="form-group col-xs-2">
		<label for="" class="pull-left">Código</label>
		<input type="text" style="text-transform: uppercase;" id="code" name="code" class="form-control" value="{{ $client->code or old('code') }}">
		{!! $errors->first('code', '<span class="error">:message</span>') !!}
	</div>
	<div align="center">
		<canvas id="canvas" name="ife" style="width:70px"></canvas>
	</div>
	<p id="estado" style="display: none"></p>
	<div class="form-group col-xs-1">
		<li style="color: #fff"></li>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#photoClients">
			<i class="fa fa-camera" style="width: 20px"></i>
		</button>
	</div>	
</div>

@include('clients.modal')

<label style="font-weight: bold; text-align: center">CONTACTO</label>
<hr style="border: 1px solid #03a9f4; border-radius: 200px /8px; height: 0px; text-align: center;">

<div class="row col-xs-12">
	<div  class="form-group col-xs-6">
		<label for="" class="pull-left">Email</label>
		<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $client->email or old('email') }}">
		{!! $errors->first('email', '<span class="error">:message</span>') !!}		
	</div>
	<div class="form-group col-xs-3">
		<label for="" class="pull-left">Teléfono</label>
		<input type="text" class="form-control" name="phone" id="phone" placeholder="Teléfono" value="{{ $client->phone or old('phone') }}">
		{!! $errors->first('phone', '<span class="error">:message</span>') !!}
	</div>
	<div class="form-group col-xs-3">
		<label for="" class="pull-left">Celular</label>
		<input type="text" class="form-control" name="cell" id="cell" placeholder="Celular" value="{{ $client->cell or old('cell') }}">
		{!! $errors->first('cell', '<span class="error">:message</span>') !!}		
	</div>
</div>

<label style="font-weight: bold; text-align: center">DIRECCIÓN</label>
<hr style="border: 1px solid #03a9f4; border-radius: 200px /8px; height: 0px; text-align: center;">

<div class="row col-xs-12">
	<div  class="form-group col-xs-8">
		<label for="" class="pull-left">Calle</label>
		<input type="text" class="form-control" style="text-transform:capitalize;" placeholder="Calle" name="street" id="street" value="{{ $client->street or old('street') }}">		
		{!! $errors->first('street', '<span class="error">:message</span>') !!}
	</div>
	<div class="form-group col-xs-2">
		<label for="" class="pull-left"># Exterior</label>
		<input type="text" class="form-control" name="nex" id="nex" placeholder="# Exterior" value="{{ $client->nex or old('nex') }}">		
		{!! $errors->first('nex', '<span class="error">:message</span>') !!}
	</div>
	<div class="form-group col-xs-2">
		<label for="" class="pull-left"># Interior</label>
		<input type="text" class="form-control" name="nin" id="nin" placeholder="# Interior" value="{{ $client->nin or old('nin') }}">		
		{!! $errors->first('nin', '<span class="error">:message</span>') !!}
	</div>	
</div>
<div class="row col-xs-12">
	<div class="form-group col-xs-9">
		<label for="" class="pull-left">Colonia</label>
		<input type="text" class="form-control" style="text-transform:capitalize;" placeholder="Colonia" name="col" id="col" value="{{ $client->col or old('col') }}">		
		{!! $errors->first('col', '<span class="error">:message</span>') !!}
	</div>
	<div class="form-group col-xs-3">
		<label for="" class="pull-left">C.P.</label>
		<input type="text" class="form-control" name="pc" id="pc" placeholder="C.P." value="{{ $client->pc or old('pc') }}">		
		{!! $errors->first('pc', '<span class="error">:message</span>') !!}
	</div>
</div>

<script>
	function gcode(){
		var names = document.getElementById("name").value;
		var codes = names.concat(' ').replace(/([a-zA-Z]{0,} )/g, function(match){ return (match.trim()[0]);}); 
	    
	document.getElementById("code").value = codes;
	}
</script>

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
			$phone = document.getElementById("phone");
			$cell = document.getElementById("cell");
			$email = document.getElementById("email");
			$street = document.getElementById("street");
			$nex = document.getElementById("nex");
			$nin = document.getElementById("nin");
			$col = document.getElementById("col");
			$pc = document.getElementById("pc");

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
						var ife = $canvas.toDataURL(); //Esta es la foto, en base 64
						$estado.innerHTML = "Enviando foto. Por favor, espera...";
						 $.ajaxSetup({
						 	headers: {
						 		'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
						 	}
						 });
						$.ajax({
							type: "POST",
							url: "/clientes",
							data: JSON.stringify({
								"_token": $('meta[name="_token"]').attr('content'),
								"ife":ife,
								"name": $name.value,
								"code": $code.value,
								"email": $email.value,
								"phone": $phone.value,
								"cell": $cell.value,
								"street": $street.value,
								"nex": $nex.value,
								"nin": $nin.value,
								"col": $col.value,
								"pc": $pc.value
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