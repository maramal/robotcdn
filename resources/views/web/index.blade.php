@extends('layouts.app')

@section('title')
@lang('webIndex.title')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="jumbotron">
		  <h1>@lang('webIndex.jumbotronTitle')</h1>
		  <p>@lang('webIndex.jumbotronParagraph')</p>
		  <p><a class="btn btn-success btn-lg" href="#" role="button">@lang('webIndex.jumbotronButton')</a></p>
		</div>
	</div>
</div>
<div class="row">
	<h1><strong>1.</strong> @lang('webIndex.stepOne')</h1>
	<div class="col-md-8 col-md-offset-2">
		<select class="form-control" id="searchcdn">
			<option></option>
			@foreach($cdns as $cdn)
			<option value="{{ $cdn->id }}">{{ $cdn->file_name }}</option>
			@endforeach
		</select>
	</div>
</div>
<hr>
<div class="row">
	<h1><strong>2.</strong> @lang('webIndex.stepTwo')</h1>
	<div class="col-md-6 col-md-offset-3">
		<div class="input-group">
			<input type="text" class="form-control" id="cdnurl">
			<span class="input-group-btn">
				<button class="btn btn-primary" data-clipboard-target="#cdnurl" id="copyToClipboard"><i class="fa fa-clipboard"></i></button>
			</span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col text-center">
		<h3><strong>@lang('webIndex.currentVersion')</strong></h3>
		<p class="lead" id="currentVersion"></p>
	</div>
</div>
<hr>
<div class="row">
	<div class="col text-center">
		<i class="fa fa-exclamation-triangle fa-4x" style="color:orange;"></i>
		<h1>@lang('webIndex.notFoundTitle')</h1>
		<a class="btn btn-danger" href="{{ secure_url('https://github.com/maramal/robotcdn/issues') }}" target="_blank"><i class="fa fa-github fa-lg"></i> @lang('webIndex.notFoundButton')</a>
	</div>
</div>
<hr>
@endsection

@section('external_css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet">
@endsection

@section('external_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
<script src="@lang('webIndex.s2LangURL')"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>
@endsection

@section('embedded_js')
<script>
	new Clipboard('#copyToClipboard');
	
	$('#searchcdn').select2({
		placeholder: "@lang('webIndex.s2placeHolder')",
		language: "@lang('webIndex.s2Lang')",
	});
	
	$('#searchcdn').on('select2:select', function (e) {
		$.ajax({
			url: '/url/' + e.params.data.id,
			type: 'GET',
			dataType: 'json',
			cache: false,
			success: function(r) {
				$('#cdnurl').val( "{{ url('/lib') }}" + '/' + r.file_name);
				$('#currentVersion').text(r.current_version);
			}
		});
	});
</script>
@endsection