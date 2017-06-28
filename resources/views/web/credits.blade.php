@extends('layouts.app')

@section('title')
| @lang('credits.title')
@endsection

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<ol class="breadcrumb">
			<li><a href="{{ action('WebController@index') }}"><i class="fa fa-home"></i></a></li>
			<li>@lang('credits.title')</li>
		</ol>
		
		<h1>@lang('credits.title')</h1>
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2 text-center">
		<img src="/public/img/laravel.png" alt="Logo Laravel">
		<p class="lead">
			@lang('credits.laravel')
		</p>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-8 col-md-offset-2 text-center">
		<img src="/public/img/bootstrap.png" alt="Logo Bootstrap">
		<p class="lead">
			@lang('credits.bootstrap')
		</p>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-8 col-md-offset-2 text-center">
		<p class="lead"><i class="fa fa-font-awesome fa-4x"></i></p>
		<p class="lead"><strong>Font Awesome</strong></p>
		<p class="lead">
			@lang('credits.fontawesome')
		</p>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-8 col-md-offset-2 text-center">
		<img src="/public/img/letsencrypt.svg" alt="Logo Let's Encrypt">
		<p class="lead">
			@lang('credits.letsencrypt')
		</p>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-8 col-md-offset-2 text-center">
		<h1><strong>DataTables</strong></h1>
		<p class="lead">
			@lang('credits.datatables')
		</p>
	</div>
</div>
@endsection