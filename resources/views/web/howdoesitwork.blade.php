@extends('layouts.app')

@section('title')
| @lang('howdoesitwork.title')
@endsection

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<ol class="breadcrumb">
			<li><a href="{{ action('WebController@index') }}"><i class="fa fa-home"></i></a></li>
			<li>@lang('howdoesitwork.title')</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>@lang('howdoesitwork.belowTitle')</h1>
		<hr>
		<div class="embed-responsive embed-responsive-16by9">
    	<iframe class="embed-responsive-item" src="@lang('howdoesitwork.videoURL')"></iframe>
		</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="text-center">@lang('howdoesitwork.faqTitle'):</h1>
		<hr>
		<h2>@lang('howdoesitwork.faqFirstQuestion')</h2>
		<p class="lead">
			@lang('howdoesitwork.faqFirstAnswer')
		</p>
		<hr>
		<h2>@lang('howdoesitwork.faqSecondQuestion')</h2>
		<p class="lead">
			@lang('howdoesitwork.faqSecondAnswer')
		</p>
		<hr>
		<h2>@lang('howdoesitwork.faqThirdQuestion')</h2>
		<p class="lead">
			@lang('howdoesitwork.faqThirdAnswer')
		</p>
	</div>
</div>
@endsection