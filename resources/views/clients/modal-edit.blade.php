<div class="md-modal md-effect-11" id="modal-11{{$client->id}}" role="dialog">
	<div class="md-content">
		<div class="modal-header">
			<button class="md-close close">&times;</button>
			<label class="modal-title" style="color: #03a9f4; font-size: 20px; font-weight: bold">
				Editar cliente
			</label>
		</div>
		<div class="modal-body">
			<form role="form" method="POST" 
			action="{{ route('clientes.update', $client->id) }}"
			enctype="multipart/form-data">
			{!! method_field('PUT') !!}

			@include('clients.form')

			<div align="right">
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</div>
		</form>
		</div>
	</div>
</div>