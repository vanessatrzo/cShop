<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" id="png">&times;</button>
				<h4 class="modal-title">Tomar foto</h4>
			</div>

			<div class="modal-body">
				<video id="video"></video>
			</div>

			<div class="modal-footer">
				 <p id="estado" style="display: none"></p>
				<button type="button" class="btn btn-info" id="startbutton">
					<i class="fa fa-camera" style="width: 20px"></i>
				</button>
			</div>
		</div>
	</div>
</div>

<script>

	(function() {

		var streaming = false,
		video        = document.querySelector('#video'),
		cover        = document.querySelector('#cover'),
		canvas       = document.querySelector('#canvas'),
		photo        = document.querySelector('#photo'),
		startbutton  = document.querySelector('#startbutton'),
		width = 200,
		height = 0;

		navigator.getMedia = ( navigator.getUserMedia || 
			navigator.webkitGetUserMedia ||
			navigator.mozGetUserMedia ||
			navigator.msGetUserMedia);


		navigator.mediaDevices.getUserMedia({ audio: false, video: true }).then((stream)=>{
			console.log(stream)

			let video = document.getElementById('video')

			video.srcObject = stream

			video.onloadedmetadata = (ev) => video.play()

		}).catch((err)=>console.log(err))

		video.addEventListener('canplay', function(ev){
			if (!streaming) {
				height = video.videoHeight / (video.videoWidth/width);
				video.setAttribute('width', width);
				video.setAttribute('height', height);
				canvas.setAttribute('width', width);
				canvas.setAttribute('height', height);
				streaming = true;
			}
		}, false);

		function takepicture() {
			canvas.width = width;
			canvas.height = height;
			canvas.getContext('2d').drawImage(video, 0, 0, width, height);
			var data = canvas.toDataURL('image/png');
			photo.setAttribute(data);
		}

		startbutton.addEventListener('click', function(ev){
			takepicture();
			ev.preventDefault();
		}, false);

	})();
</script>

<script>
	var png = document.getElementById("png");
	png.addEventListener("click",function(){	
		img.src = canvas.toDataURL("image/png");	
	},false);
	var img = document.getElementById("picture");
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

							var foto = $canvas.toDataURL(); //Esta es la foto, en base 64
							$estado.innerHTML = "Enviando foto. Por favor, espera...";
							$.ajaxSetup({
								headers: {
									'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
								}
							});

							$.ajax({
							  	type: "POST",
							  	url: "webcam",
							  	data: JSON.stringify({foto:foto}),
			    			  	processData: false,
							  	cache: false,
							  	dataType: "json",
							  	contentType:"application/json; charset=utf-8",
							  	success: function (result) {
							    	//('#richi').html(foto)
							    	
							  	}
							});
						$estado.html = "Foto guardada con éxito. Puedes verla <a target='_blank' href='./" + foto.responseText + "'> aquí</a>";
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