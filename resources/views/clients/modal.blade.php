<div align="center">
	<div class="modal fade" id="photoClients" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" id="png">&times;</button>
					<h4 class="modal-title">Foto IFE</h4>
				</div>
				<div class="modal-body">
					<video id="video"></video>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" id="startbutton">
						<i class="fa fa-camera" style="width: 20px"></i>
					</button>
				</div>
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
			photo.setAttribute('src', data);
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
	var img = document.getElementById("ife_p");
		 
		var png = document.getElementById("png");
		png.addEventListener("click",function(){	
			img.src = canvas.toDataURL("image/png");	
		},false);
</script>