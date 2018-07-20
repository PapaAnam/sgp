<div class="{{ $errors->has($id) ? 'has-warning ' : ' ' }}row form-group">
	<div class="col col-md-3">
		<label for="{{ $id }}" class=" form-control-label">{{ $label }}</label>
	</div>
	<div class="col-12 col-md-9">
		<input @isset($readonly) readonly="readonly" @endisset type="text" id="{{ $id }}" name="{{ $id }}" placeholder="{{ $label }}" class="{{ $errors->has($id) ? 'is-invalid ' : ' ' }}form-control" value="{{ old($id) ? old($id) : (isset($value) ? $value : '') }}">
		@isset($hint)
		<small class="form-text text-muted">{{ $hint }}</small>
		@endisset
		@if($errors->has($id))
		<small class="form-text text-danger">{{ $errors->first($id) }}</small>
		@endisset
	</div>
</div>