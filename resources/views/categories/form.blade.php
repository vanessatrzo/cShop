{{Form::token()}}
<div class="form-group">
	<label for="name">Nombre</label>
	<input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="Nombre...">
</div>
<div class="form-group">
	<label for="description">Descripción</label>
	<input type="text" name="description" class="form-control" value="{{$category->description}}" placeholder="Descripción...">
</div>