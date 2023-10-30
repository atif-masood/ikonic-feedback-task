<!DOCTYPE html>
<html>
<head>
  <title>@yield('title') - Ikonic Task</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
  <link href="{{URL::asset('assets/plugins/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <link href="{{URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <div class="container-scroller" id="app">
    @include('layout.header')
    <div class="container-fluid page-body-wrapper">
      @include('layout.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('layout.footer')
      </div>
    </div>
  </div>

  <!-- base js -->
  <link href="{{URL::asset('js/app.js') }}" rel="stylesheet" type="text/javascript" />
  <link href="{{URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}" rel="stylesheet" type="text/javascript" />
  <!-- end base js -->

  <!-- plugin js -->
  @stack('plugin-scripts')
  <!-- end plugin js -->

  <!-- common js -->
  <link href="{{URL::asset('assets/js/off-canvas.js') }}" rel="stylesheet" type="text/javascript" />
  <link href="{{URL::asset('assets/js/hoverable-collapse.js') }}" rel="stylesheet" type="text/javascript" />
  <link href="{{URL::asset('assets/js/misc.js') }}" rel="stylesheet" type="text/javascript" />
  <link href="{{URL::asset('assets/js/settings.js') }}" rel="stylesheet" type="text/javascript" />
  <link href="{{URL::asset('assets/js/todolist.js') }}" rel="stylesheet" type="text/javascript" />
  <!-- end common js -->

  @stack('custom-scripts')
</body>
</html>