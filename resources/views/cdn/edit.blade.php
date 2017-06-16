@extends('layouts.app')

@section('title')
| @lang('cdnEdit.firstTitle'): @lang('cdnEdit.secondTitle')'
@endsection

@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ action('WebController@index') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ action('CDNController@index') }}">@lang('cdnEdit.firstTitle')</a></li>
		<li>{{ $cdn->file_name }}</li>
		<li>@lang('cdnEdit.secondTitle')</li>
	</ol>
	<h2>@lang('cdnEdit.editCDN'): {{ $cdn->file_name }}</h2>
</div>
<hr>
<div class="col-md-4">
	<form class="form-horizontal" method="POST" action="{{ action('CDNController@update', [ 'id' => $cdn->id ]) }}">
		{{ csrf_field() }}
		{{ method_field('put') }}
		<div class="form-group">
			<label for="file_name" class="control-label">@lang('cdnEdit.formFileName')</label>
			<input type="text" id="file_name" name="file_name" class="form-control" value="{{ $cdn->file_name }}" required>
		</div>
		<div class="form-group">
			<label for="file_type" class="control-label">@lang('cdnEdit.formFileType')</label>
			<select class="form-control" id="file_type" name="file_type">
				@if($cdn->file_type === 'js')
				<option disabled>@lang('cdnEdit.formFileTypeSelect')</option>
				<option value="js" selected>Javascript</option>
				<option value="css">Cascade Style Sheet</option>
				@elseif($cdn->file_type === 'css')
				<option disabled>@lang('cdnEdit.formFileTypeSelect')</option>
				<option value="js">Javascript</option>
				<option value="css" selected>Cascade Style Sheet</option>
				@else
				<option disabled selected>@lang('cdnEdit.formFileTypeSelect')</option>
				<option value="js">Javascript</option>
				<option value="css">Cascade Style Sheet</option>
				@endif
			</select>
		</div>
		<div class="form-group">
			<label for="url" class="control-label">@lang('cdnEdit.formURL')</label>
			<input type="text" id="url" name="url" class="form-control" value="{{ $cdn->url }}" required>
		</div>
		<div class="form-group">
			<label for="current_version" class="control-label">@lang('cdnEdit.formCurrentVersion')</label>
			<input type="text" id="current_version" name="current_version" class="form-control" value="{{ $cdn->current_version }}" required>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> @lang('cdnEdit.formSubmit')</button>
		</div>
	</form>
</div>
@endsection