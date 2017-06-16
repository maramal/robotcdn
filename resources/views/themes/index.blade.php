@extends('layouts.app')

@section('title')
| @lang('themesIndex.firstTitle'): @lang('themesIndex.secondTitle')
@endsection

@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ action('ThemeController@index') }}"><i class="fa fa-home"></i></a></li>
		<li>@lang('themesIndex.themes')</li>
	</ol>
	<h2>@lang('themesIndex.themes')</h2>
</div>
<div class="col-md-12">
	<a href="{{ action('ThemeController@create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('themesIndex.createTheme')</a>
	<hr>
	<table class="table table-striped table-bordered" width="100%" cellspacing="0" id="cards">
		<thead>
			<tr>
				<th>@lang('themesIndex.tableName')</th>
				<th>@lang('themesIndex.tableURL')</th>
				<th>@lang('themesIndex.tableActions')</th>
			</tr>
		</thead>
		<tbody>
			@foreach($themes as $theme)
			<tr>
				<td>{{ $theme->name }}</td>
				<td>{{ $theme->url }}</td>
				<td>
					<a class="btn @if($theme->used) btn-success @else btn-default @endif" href="{{ action('ThemeController@use', ['id' => $theme->id ]) }}"><i class="fa fa-eyedropper"></i></a>
					<a class="btn btn-primary" href="{{ action('ThemeController@edit', [ 'id' => $theme->id ]) }}"><i class="fa fa-pencil"></i></a> 
					<a class="btn btn-danger" href="{{ action('ThemeController@destroy', [ 'id' => $theme->id ]) }}"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

@section('external_css')
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/responsive/2.1.1/css/responsive.jqueryui.css') }}">
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('external_js')
<script src="{{ asset('https://code.jquery.com/jquery-1.12.4.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js') }}"></script>
@endsection

@section('embedded_js')
<script>
$('#cards').DataTable({
	"language": {
		"url": "@lang('themesIndex.dtJSON')"
	}
});
</script>
@endsection