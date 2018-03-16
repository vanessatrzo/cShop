<div class="md-modal md-effect-11 col-md-12" id="modal-11{{$product->id}}" role="dialog">
	<div class="md-content col-md-12">
		<div class="modal-header">
			<button class="md-close close">&times;</button>
			<label class="modal-title" style="color: #03a9f4; font-size: 20px; font-weight: bold">
				{{ $product->name }}
			</label>
			<br>
			<label>
				{{ $product->description }}
			</label>
			<div class="profile-label" style="text-transform: uppercase;">
				<span class="label label-success">{{ $product->code }}</span>
			</div>
		</div>
		<div class="modal-body col-md-12">
			<div class="col-md-6">
				<img width="40%" src="{{ Storage::url($product->picture) }}">
			</div>
			<div class="col-md-6 text-left">
				<ul class="fa-ul">
					<li><i class="fa-li fa fa-calendar"></i>
						Alta: 
						<span>{{ $product->created_at }}</span>
					</li>
					<li><i class="fa-li fa fa-dollar"></i>
						Precio: 
						<span>${{ $product->price }}</span>
					</li>
					<li><i class="fa-li fa fa-hashtag"></i>
						Cantidad: 
						<span>{{ $product->quantity }}</span>
					</li>
					<li><i class="fa-li fa fa-tag"></i>
						Categoría: 
						<span>{{ $product->category }}</span>
					</li>
					<li><i class="fa-li fa fa-map-marker"></i>
						Ubicación: 
						<span>{{ $product->ubication }}</span>
					</li>
					<li><i class="fa-li fa fa-check"></i>
						Estado: 
						<span>{{ $product->status }}</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
