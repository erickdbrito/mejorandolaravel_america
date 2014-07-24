<div class="form-group">
	{{ Form::label($name, $label) }}
	{{ $control }}
	@if ($error)
		<p class="alert alert-danger alert-dismissible">{{ $error }}</p>
	@endif
</div>