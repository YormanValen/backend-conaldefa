<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Yorman Salgado Valencia">
  <meta name="generator" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">


  <title></title>

  <!-- Bootstrap core CSS -->

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>



</head>

<body>

  @include('layouts.partials.navbar')

  <main class="container">
    @yield('content')
  </main>

  <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

</body>

</html>