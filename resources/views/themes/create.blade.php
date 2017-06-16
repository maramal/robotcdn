@extends('layouts.app')

@section('title')
| @lang('themesCreate.firstTitle'): @lang('themesCreate.secondTitle')
@endsection

@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ action('WebController@index') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ action('ThemeController@index') }}">@lang('themesCreate.firstTitle')</a></li>
		<li>@lang('themesCreate.new')</li>
	</ol>
	<h2>@lang('themesCreate.newTheme')</h2>
</div>
<hr>
<div class="col-md-4">
	<form class="form-horizontal" method="POST" action="{{ action('ThemeController@store') }}">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name" class="control-label">@lang('themesCreate.themeName')</label>
			<input type="text" id="name" name="name" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="url" class="control-label">@lang('themesCreate.themeURL')</label>
			<input type="text" id="url" name="url" class="form-control" required>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> @lang('themesCreate.submitButton')</button>
		</div>
	</form>
</div>
@endsection

@section('external_css')
<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.css') }}" />
@endsection

@section('external_js')
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/es.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js') }}"></script>
@endsection

@section('embedded_js')
<script>
$('#holder_id').select2({
	language: "es"
});
</script>
@endsection