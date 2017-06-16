@extends('layouts.app')

@section('title')
| @lang('cdnCreate.firstTitle'): @lang('cdnCreate.secondTitle')
@endsection

@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ action('WebController@index') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ action('CDNController@index') }}">@lang('cdnCreate.firstTitle')</a></li>
		<li>@lang('cdnCreate.new')</li>
	</ol>
	<h2>@lang('cdnCreate.newCDN')</h2>
</div>
<hr>
<div class="col-md-4">
	<form class="form-horizontal" method="POST" action="{{ action('CDNController@store') }}">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="file_name" class="control-label">@lang('cdnCreate.formFileName')</label>
			<input type="text" id="file_name" name="file_name" class="form-control" value="{{ old('file_name') }}" required>
		</div>
		<div class="form-group">
			<label for="file_type" class="control-label">@lang('cdnCreate.formFileType')</label>
			<select class="form-control" id="file_type" name="file_type">
				<option disabled selected>@lang('cdnCreate.formFileTypeSelect')</option>
				<option value="js">Javascript</option>
				<option value="css">Cascade Style Sheet</option>
			</select>
		</div>
		<div class="form-group">
			<label for="url" class="control-label">@lang('cdnCreate.formURL')</label>
			<input type="text" id="url" name="url" class="form-control" value="{{ old('url') }}" required>
		</div>
		<div class="form-group">
			<label for="current_version" class="control-label">@lang('cdnCreate.formCurrentVersion')</label>
			<input type="text" id="current_version" name="current_version" class="form-control" required value="{{ old('current_version') }}">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> @lang('cdnCreate.submitButton')</button>
		</div>
	</form>
</div>
@endsection