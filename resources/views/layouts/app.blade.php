<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Mirrored from www.urbanui.com/salt/jquery/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2017 12:33:56 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/node_modules/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/node_modules/font-awesome/css/font-awesome.min.css') }}" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.html') }}" />
</head>

<body class="sidebar-dark" id="app">
    @yield('content')
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/node_modules/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/misc.js') }}"></script>
  <script src="{{ asset('assets/js/settings.js') }}"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/salt/jquery/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2017 12:33:56 GMT -->
</html>
