{!! csrf_field() !!}

<div align="center">
	<canvas id="canvas" name="picture" style="width:200px"></canvas>
</div>

<p id="estado" style="display: none"></p>

<div align="center">
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
		<i class="fa fa-camera" style="width: 20px"></i>
	</button>
</div>

@include('users.modal')

<div class="input-group" style="margin: 5px">
	<span class="input-group-addon"><i class="fa fa-user" style="width: 20px"></i></span>
	<input class="form-control" id="name" type="text" name="name" value="{{ $user->name or old('name') }}">
	{!! $errors->first('name', '<span class="error">:message</span>') !!}
</div>

<div class="input-group" style="margin: 5px">
	<span class="input-group-addon"><i class="fa fa-envelope" style="width: 20px"></i></span>
	<input class="form-control" id="email" type="text" name="email" value="{{ $user->email or old('email') }}">
	{!! $errors->first('email', '<span class="error">:message</span>') !!}
</div>

@unless ($user->id)
	<div class="input-group" style="margin: 5px" for="password">
		<span class="input-group-addon"><i class="fa fa-lock" style="width: 20px"></i></span>
		<input id="password" type="password" class="form-control" name="password">
		{!! $errors->first('password', '<span class="error">:message</span>') !!}
	</div>

	<div class="input-group" style="margin: 5px" for="password_confirmation">
		<span class="input-group-addon"><i class="fa fa-lock" style="width: 20px"></i></span>
		<input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
		{!! $errors->first('password_confirmation', '<span class="error">:message</span>') !!}
	</div>
@endunless

<div class="btn-group" data-toggle="buttons" style="display: none">
	@foreach ($roles as $id => $key)
		<label class="btn btn-primary">
			<input 
			type="radio"
			value="{{ $id }}"
			{{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }} 
			name="roles[]"> 

			{{ $key }}
		</label>
	@endforeach
</div>

<br>
{!! $errors->first('roles', '<span class="error">:message</span>') !!}
<hr>

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
			$save = document.getElementById("save"),
			$estado = document.getElementById("estado");
			$name = document.getElementById("name");
			$email = document.getElementById("email");
			$password = document.getElementById("password");
			$password_confirmation = document.getElementById("password_confirmation");

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

					$save.addEventListener("click", function(){
						var picture = $canvas.toDataURL(); //Esta es la foto, en base 64
						$estado.innerHTML = "Enviando foto. Por favor, espera...";
						 $.ajaxSetup({
						 	headers: {
						 		'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
						 	}
						 });
						$.ajax({
							type: "POST",
							url: "/usuarios",
							data: JSON.stringify({
							"_token": $('meta[name="_token"]').attr('content'),
							"name": $name.value,
							"email": $email.value,
							"password": $password.value,
							"picture":picture,
							"password_confirmation": $password_confirmation.value
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