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
    @yield('meta_tags')

    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/css/tether.css') }}">
    <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
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
            <a class="navbar-brand" href="#">Robot CDN</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="{{ action('WebController@index') }}"><i class="fa fa-home"></i> @lang('layoutsApp.navHome')</a></li>
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

    <!-- External JS -->
    <script src="{{ asset('https://code.jquery.com/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js') }}"></script>
    <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}"></script>
    @yield('external_js')
    
    <!-- Internal JS -->
    @yield('internal_js')

    <!-- Embedded JS -->
    @yield('embedded_js')
  </body>
</html>