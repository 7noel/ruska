<div class="form-group-sm">
	{{ Form::label($name, $label, ['class'=>'col-sm-4 control-label']) }}
	<div class="col-sm-8">
	{{ $control }}
	@if($errors)
		<p class="error_message">{{ $error }}</p>
	@endif
	</div>
</div>