@extends('layouts.app')

@section('title')
| @lang('cdnIndex.firstTitle'): @lang('cdnIndex.secondTitle')
@endsection

@section('content')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ action('CDNController@index') }}"><i class="fa fa-home"></i></a></li>
		<li>@lang('cdnIndex.cdns')</li>
	</ol>
	<h2>@lang('cdnIndex.cdns')</h2>
</div>
<div class="col-md-12">
	<a href="{{ action('CDNController@create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('cdnIndex.createCDN')</a>
	<hr>
	<table class="table table-striped table-bordered" width="100%" cellspacing="0" id="cards">
		<thead>
			<tr>
				<th>@lang('cdnIndex.tableFileName')</th>
				<th>@lang('cdnIndex.tableFileType')</th>
				<th>@lang('cdnIndex.tableURL')</th>
				<th>@lang('cdnIndex.tableCurrentVersion')</th>
				<th>@lang('cdnIndex.tableActions')</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cdns as $cdn)
			<tr>
				<td>{{ $cdn->file_name }}</td>
				<td>{{ $cdn->file_type }}</td>
				<td>{{ $cdn->url }}</td>
				<td>{{ $cdn->current_version }}</td>
				<td>
					<a class="btn btn-primary" href="{{ action('CDNController@edit', [ 'id' => $cdn->id ]) }}"><i class="fa fa-pencil"></i></a> 
					<a class="btn btn-danger" href="{{ action('CDNController@destroy', [ 'id' => $cdn->id ]) }}"><i class="fa fa-trash"></i></a>
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
		"url": "@lang('cdnIndex.dtJSON')"
	}
});
$('')
</script>
@endsection