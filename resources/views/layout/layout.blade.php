<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
@section('header')
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title','ERP Master Page')</title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/css/img/imgAdmin/ico/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendors.min.css')}}    ">
    <link rel="stylesheet" type="text/css" href="{{asset('css/unslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/meteocons-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/morris.css')}}">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/card-statistics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/vertical-timeline.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/simple-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-timepicker.min.cs')}}">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!-- END: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/toastr.min.css')}}">
</head>
<!-- END: Head-->
@show
@yield('content')
@section('footer')
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<!-- BEGIN: Vendor JS-->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{asset('js/vendors.min.js')}}"></script>

<!-- BEGIN Vendor JS-->
<script type="text/javascript" src="{{asset('js/raphael-min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/morris.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/unslider-min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/horizontal-timeline.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script type="text/javascript" src="{{asset('js/app-menu.js')}}"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<script type="text/javascript" src="{{asset('js/datatable-advanced.js')}}"></script>
<!-- END: Page JS-->
<!-- BEGIN: Page Vendor JS-->
<script type="text/javascript" src="{{asset('js/apexcharts.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/buttons.flash.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/buttons.print.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script type="text/javascript" src="{{asset('js/dashboard-ecommerce.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- END: Page JS-->

<!-- BEGIN: Page JS-->
<script type="text/javascript" src="{{asset('js/card-statistics.js')}}"></script>
<!-- END: Page JS-->
<script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</body>
</html>
@show
@section('customfooter')
@show