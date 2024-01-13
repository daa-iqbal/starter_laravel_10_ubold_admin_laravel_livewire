<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8"/>
  @yield('title')
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
  <meta content="Coderthemes" name="author"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/images/favicon.ico') }}">
  <!-- Sweet Alert-->
  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/sweetalert2/sweetalert2.min.css') }}"
        rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Plugins css -->
  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/flatpickr/flatpickr.min.css') }}"
        rel="stylesheet" type="text/css"/>


  <!-- App css -->
  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/css/config/modern/bootstrap.min.css') }}"
        rel="stylesheet" type="text/css" id="bs-default-stylesheet"/>

  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/css/config/modern/app.min.css') }}" rel="stylesheet"
        type="text/css" id="app-default-stylesheet"/>

  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/css/config/modern/bootstrap-dark.min.css') }}"
        rel="stylesheet" type="text/css" id="bs-dark-stylesheet"/>
  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/css/config/modern/app-dark.min.css') }}"
        rel="stylesheet" type="text/css" id="app-dark-stylesheet"/>

  <!-- icons -->
  <link href="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/css/icons.min.css') }}" rel="stylesheet"
        type="text/css"/>

  <style>
    .form-select-custom option{
      border-radius: 0 !important;
      font-size: .84rem !important;
      padding-bottom: 10px !important;
    }

    .button-hover-color-scheme{
      border-color: #6D757D;
    }

    .clock {

      color: #323a46;
      font-size: 25px;
      font-family: sans-serif;
      letter-spacing: 10px;
      padding-bottom: 10px;
    }

    hr {
      display: block;
      margin-top: 0.5em;
      margin-bottom: 0.5em;
      margin-left: auto;
      margin-right: auto;
      border-style: inset;
      border-width: 1px;
      color: gray;
      background-color: gray;
    }

    .content-page {
      margin-left : 270px;
    }

    .left-side-menu {
      width: 270px;
      bottom: 100px;
    }

    .footer {
      left: 0;
      position: fixed;
      z-index: 10;
    }
    .sorting {
       vertical-align: middle!impotant;
    }
    /* table > thead > tr >th {
      height : 45px;
    } */

    .activate-select {
      color: whitesmoke !important;
      background: #DF2333 !important;
    }

     select[name="datatable_length"] option {
      margin: 40px;

      color: #fff;
      text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
    }
    select[name="datatable-semua-cohort_length"] option {
      margin: 40px;

      color: #fff;
      text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
    }

    select[name="datatable-system-cohort_length"] option {
      margin: 40px;

      color: #fff;
      text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
    }

    .content {
      margin-bottom: 100px;
    }

    .header-title {
      padding-bottom: 0px !important;
      font-size: 1.125rem !important;
    }

    hr {
      background-color: #D5DEEB !important;
      border: 1px !important;
    }

    .fw-semibold {
      font-size: 500;
    }

    .form-label {
      margin-top: 10px;
    }
    .mdi{
      vertical-align: middle !important;
    }

    /* .back-button:hover{
      color: #DF2333;
    } */

    /* .breadcrumb-link:hover{
      color: #DF2333;
    } */

    .custom-padding-card-22 {
      padding-bottom: 22.5px
    }

    .apexcharts-legend-marker{
      border-radius: 0 !important;
      margin: 3px 8px !important;
    }

    .inbox-widget .inbox-item {
      padding: 0; !important
    }
  </style>


  @yield('style')
</head>

<!-- body start -->
<body class="loading" data-layout-mode="detached"
      data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": false}'>

<!-- Begin page -->
<div id="wrapper">
  @yield('navbar')
  @yield('left_sidebar')
  @yield('content')


  <!-- ============================================================== -->
  <!-- End Page content -->
  <!-- ============================================================== -->

  <!-- Footer Start -->
@include('layouts.footer')
<!-- end Footer -->
</div>
@yield('right_sidebar')

<!-- Vendor js -->
<script src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/js/vendor.min.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>


<!-- Plugins js-->
<script src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/flatpickr/flatpickr.min.js') }}"></script>


<script
  src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
<script src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/libs/tippy.js/tippy.all.min.js') }}"></script>

<!-- App js-->
<script src="{{ asset('templates/UBold_v5.1.0/Admin/dist/assets/js/app.min.js') }}"></script>

<script>


</script>
@yield('script')
<script>
  $(document).ready(function () {

  });
</script>
</body>
</html>
