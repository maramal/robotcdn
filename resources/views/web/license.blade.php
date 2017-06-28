@extends('layouts.app')

@section('title')
| @lang('license.title')
@endsection

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<ol class="breadcrumb">
			<li><a href="{{ action('WebController@index') }}"><i class="fa fa-home"></i></a></li>
			<li>@lang('license.title')</li>
		</ol>
		
		<h1>@lang('license.title')</h1>
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<p class="lead"><strong>@lang('license.copyright')</strong></p>
		<p class="lead">@lang('license.first')</p>
		<p class="lead">@lang('license.second')</p>
		<p class="lead">@lang('license.third')</p>
	</div>
</div>
@endsection