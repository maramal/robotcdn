<?php
  $current_theme = \App\Theme::where('used', true)->first();
  if($current_theme)
  {
    ($current_theme->count() > 0)
      ? $current_theme = $current_theme->url
      : '';
  }
?>
<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
  <head>
    <title>Robot CDN @yield('title')</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@lang('layoutsApp.metaDescription')">
    <meta name="google-site-verification" content="I-6c1jjeUiPxouAH60JfsMHH18GDIc_7xDnzd82mCbU" />
    @yield('meta_tags')

    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('https://www.robotcdn.org/lib/tether.css') }}">
    <link rel="stylesheet" href="{{ asset('https://www.robotcdn.org/lib/twitter-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://www.robotcdn.org/lib/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset($current_theme) }}">
    @yield('external_css')

    <!-- Internal CSS -->
    @yield('internal_css')

    <!-- Embedded CSS -->
    @yield('embedded_css')

  </head>
  <body>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#"><img width="120" src="{{ asset('/public/img/logo.png') }}" alt="Logo Robot CDN"></a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="{{ action('WebController@index') }}"><i class="fa fa-home"></i> @lang('layoutsApp.navHome')</a></li>
            <li><a href="{{ action('WebController@howdoesitwork') }}"><i class="fa fa-gear"></i> @lang('layoutsApp.navHowdoesitwork')</a></li>
            <li><a href="{{ action('WebController@credits') }}"><i class="fa fa-thumbs-o-up"></i> @lang('layoutsApp.navCredits')</a></li>
            <li><a href="{{ action('WebController@license') }}"><i class="fa fa-book"></i> @lang('layoutsApp.navLicense')</a></li>
            @if(Auth::check())
            <li><a href="{{ action('ThemeController@index') }}"><i class="fa fa-paint-brush"></i> @lang('layoutsApp.navThemes')</a></li>
            <li><a href="{{ action('CDNController@index') }}"><i class="fa fa-link"></i> @lang('layoutsApp.navCDNLinks')</a></li>
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i> @if(Auth::check()) {{ Auth::user()->name }} @else @lang('layoutsApp.navAccount') @endif<span class="caret"></span></a>
              <ul class="dropdown-menu">
              @if(Auth::check())
                <li><a href="{{ action('WebController@logout') }}"><i class="fa fa-sign-out"></i> @lang('layoutsApp.navLogout')</a></li>
              @else
                <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> @lang('layoutsApp.navLogin')</a></li>
              @endif
              </ul>
            </li>
            <li><a href="{{ secure_url('https://github.com/maramal/robotcdn/issues') }}" target="_blank"><strong> <i class="fa fa-external-link"></i> @lang('layoutsApp.navSubmit')</strong></a></li>
            <li>
              @if(App::isLocale('es'))
              <a href="{{ url('/locale/en') }}"><i class="fa fa-language fa-lg"></i> <strong>English</strong></a>
              @else
              <a href="{{ url('/locale/es') }}"><i class="fa fa-language fa-lg"></i> <strong>Espa&ntilde;ol</strong></a>
              @endif
            </li>
          </ul>
        </div>
      </nav>

      @if(Session::has('message'))
      <?php $message = Session::get('message'); ?> 
      <div class="container">
        <div class="alert alert-{{ $message['type'] }} alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ @$message['text'] }}
        </div>
      </div>
      @endif

      <!-- Content -->
      <div class="container">
      @yield('content')
      </div>
      <hr>
      <div class="row text-center">
        <div class="col-md-6 col-md-offset-3">
          <p>@lang('layoutsApp.footerCreatedBy')</p>
          <p>@lang('layoutsApp.footerLicense')</p>
        </div>
      </div>

    <!-- External JS -->
    <script src="{{ asset('https://www.robotcdn.org/lib/jquery.js') }}"></script>
    <script src="{{ asset('https://www.robotcdn.org/lib/tether.min.js') }}"></script>
    <script src="{{ asset('https://www.robotcdn.org/lib/twitter-bootstrap.min.js') }}"></script>
    @yield('external_js')
    
    <!-- Internal JS -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-82055070-3', 'auto');
      ga('send', 'pageview');
    
    </script>
    @yield('internal_js')

    <!-- Embedded JS -->
    @yield('embedded_js')
  </body>
</html>