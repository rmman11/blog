<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title> @yield('title')</title>

  <!-- Scripts -->


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->

  <link rel="icon" type="image/png" href="{{ asset('/public/images/badge1.gif') }} ">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



  <link href="{{ asset('/public/css/main.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/public/css/app.css') }}">
    <script src="{{ asset('/public/js/app.js') }}" defer></script>

</head>

<body id="home" class="gallivant-times-square ">
