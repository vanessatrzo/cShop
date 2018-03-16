<div class="md-modal md-effect-11 col-md-12" id="modal-12{{$client->id}}" role="dialog">
	<div class="md-content col-md-12">
		<div class="modal-header" align="center">
			<button class="md-close close">&times;</button>
			<label class="modal-title" style="text-transform:capitalize; color: #03a9f4; font-size: 20px; font-weight: bold">
				{{ $client->name }}
			</label>
			<br>
			<div class="profile-label" style="text-transform: uppercase;">
				<span class="label label-info label-large">{{ $client->code }}</span>
			</div>
		</div>
		<div class="modal-body col-md-12">
			<div class="col-lg-4" align="center">
				<img width="60%" src="{{ Storage::url($client->ife) }}" alt="" />
			</div>
			<div class="col-lg-8">
				<div class="col-lg-12">
					<ul class="fa-ul">
						<li>
							<i class="fa-li fa fa-calendar"></i>
							Creación: 
							<span>{{ $client->created_at }}</span>
						</li>
					</ul>
					<div class="col-lg-6">
						<i class="fa fa-map-marker"></i>
						&nbsp;
						<strong>Dirección</strong>
						<ul class="fa-ul">
							<li>
								Calle: 
								<span>{{ $client->street }}</span>
							</li>
							<li>
								Colonia: 
								<span>{{ $client->col }}</span>
							</li>
							<li>
								Número Ext.: 
								<span>{{ $client->nex }}</span>
							</li>
							<li>
								Número Int.: 
								<span>{{ $client->nin }}</span>
							</li>
							<li>
								C.P.: 
								<span>{{ $client->pc }}</span>
							</li>
						</ul>
					</div>
					<div class="col-lg-6">
						<i class="fa fa-phone"></i>
						&nbsp;
						<strong>Contacto</strong>
						<ul class="fa-ul">
							<li>
								Correo: 
								<span>{{ $client->email }}</span>
							</li>
							<li>
								Teléfono: 
								<span>{{ $client->phone }}</span>
							</li>
							<li>
								Celular: 
								<span>{{ $client->cell }}</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
