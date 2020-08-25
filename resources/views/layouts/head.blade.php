<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<!-- Mirrored from www.urbanui.com/salt/jquery/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2017 12:31:57 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} | {{ config('app.name', 'Tours & Travels') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/node_modules/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css') }}">
    <!-- endinject -->
    <link rel="stylesheet" href="{{ asset('assets/node_modules/select2/dist/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/node_modules/select2-bootstrap-theme/dist/select2-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/node_modules/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" />
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/node_modules/rickshaw/rickshaw.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/bower_components/chartist/dist/chartist.min.css') }}" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.html') }}" />
</head>
<body class="sidebar-dark">

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif