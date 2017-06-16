@extends('layouts.app')

@section('title')
| @lang('themesEdit.firstTitle'): @lang('themesEdit.secondTitle')'
@endsection

@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ action('WebController@index') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ action('ThemeController@index') }}">@lang('themesEdit.themes')</a></li>
		<li>{{ $theme->name }}</li>
		<li>@lang('themesEdit.edit')</li>
	</ol>
	<h2>@lang('themesEdit.editTheme'): {{ $theme->name }}</h2>
</div>
<hr>
<div class="col-md-4">
	<form class="form-horizontal" method="POST" action="{{ action('ThemeController@update', [ 'id' => $theme->id ]) }}">
		{{ csrf_field() }}
		{{ method_field('put') }}
		<div class="form-group">
			<label for="name" class="control-label">@lang('themesEdit.formName')</label>
			<input type="text" id="name" name="name" class="form-control" value="{{ $theme->name }}" required>
		</div>
		<div class="form-group">
			<label for="url" class="control-label">@lang('themesEdit.formURL')</label>
			<input type="text" id="url" name="url" class="form-control" value="{{ $theme->url }}" required>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> @lang('themesEdit.formSubmit')</button>
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