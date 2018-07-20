<div class="{{ $errors->has($id) ? 'has-warning ' : ' ' }}row form-group">
	<div class="col col-md-3">
		<label for="{{ $id }}" class=" form-control-label">{{ $label }}</label>
	</div>
	<div class="col-12 col-md-9">
		<textarea name="{{ $id }}" id="{{ $id }}" rows="9" placeholder="{{ $label }}" class="{{ $errors->has($id) ? 'is-invalid ' : ' ' }}form-control">{{ old($id) ? old($id) : (isset($value) ? $value : '') }}</textarea>
		@if($errors->has($id))
		<small class="form-text text-danger">{{ $errors->first($id) }}</small>
		@endisset
	</div>
</div>