@extends('layout')

@section('header')
	<ol class="breadcrumb">
		<li><span>Inicio</span></li>
		<li><a href="{{ route('webcam.index') }}"><span>Webcam</span></a></li>
		<li class="active"><span>Nuevo</span></li>
	</ol>
@stop

@section('title')
	<i class="fa fa-users"></i>
	Webcam
@stop

@section('content')
	<video id="video" width="300px"></video>
	<canvas id="canvas" name="foto" style="width: 300px"></canvas>
	<br>
	<button id="startbutton">
		Tomar foto
	</button>
	<button id="save">
		Guardar
	</button>
	<p id="estado" style="display: none"></p>

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

			if (tieneSoporteUserMedia()) {
		    	_getUserMedia(
		        	{video: true}, function (stream) {
			            console.log("Permiso concedido");
						$video.src = window.URL.createObjectURL(stream);
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

							$video.play();
						});

						$save.addEventListener("click", function(){

							var foto = $canvas.toDataURL(); //Esta es la foto, en base 64
							$estado.innerHTML = "Enviando foto. Por favor, espera...";
							$.ajaxSetup({
								headers: {
									'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
								}
							});

							$.ajax({
							  	type: "POST",
							  	url: "/webcam",
							  	data: JSON.stringify({foto:foto}),
			    			  	processData: false,
							  	cache: false,
							  	dataType: "json",
							  	contentType:"application/json; charset=utf-8",
							  	success: function (result) {
							    	//('#richi').html(foto)
							  	}
							});
							
							//Reanudar reproducción
							$video.play();
						});
		        	}, function (error) {
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
@stop
