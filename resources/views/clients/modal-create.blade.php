<div class="md-modal md-effect-11" id="modal-11">
	<div class="md-content">
		<div class="modal-header">
			<button class="md-close close">&times;</button>
			<label class="modal-title" style="color: #03a9f4; font-size: 20px; font-weight: bold">Nuevo cliente</label>
		</div>
		<div class="modal-body">
			@include('clients.form', ['client' => new App\Client])

				<button type="submit" class="btn btn-primary" id="add" onclick="generarTotal()">Guardar</button>
			{{-- <form role="form" method="POST" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
				
				@include('clients.form', ['client' => new App\Client])

				<div align="right">
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
				
			</form> --}}
		</div>
	</div>
</div>