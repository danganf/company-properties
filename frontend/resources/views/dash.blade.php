<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Dashboard saladero.">
    <meta name="author" content="daniel.guimaraes@intercase.com.br">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Orbital Company - Dashboard</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png{{$cdnVersionJSCSS}}">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png">
    <link href="/assets/css/fonts-googleapis.css" rel="stylesheet">
    <link href="/assets/css/line-awesome-11.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/app-assets/css/fontawesome/releases/v4.7.0/all.css{{$cdnVersionJSCSS}}">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/vendors.css{{$cdnVersionJSCSS}}">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/ui/prism.min.css{{$cdnVersionJSCSS}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/app.css{{$cdnVersionJSCSS}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css{{$cdnVersionJSCSS}}">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.css{{$cdnVersionJSCSS}}">
    <!-- ORDERS CARDS -->
    <link rel="stylesheet" type="text/css" href="/app-assets/fonts/simple-line-icons/style.min.css{{$cdnVersionJSCSS}}">
    <!-- END Page Level CSS-->

    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css{{$cdnVersionJSCSS}}">
    <!-- END Custom CSS-->
    @yield('css')
</head>
<body class="vertical-layout vertical-overlay-menu 2-columns  menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-overlay-menu" data-col="2-columns">
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-shadow navbar-brand-center" style="background-color: #212121">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <img class="logo" src="https://orbital.company/assets/images/logo.svg">
        </div>
        <div class="navbar-container content">
            @component('components.top-bar')@endcomponent
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row content-bread-crumbs">
            
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <div class="row">
        <div class="col-md-2 time">00:00</div>
        <div class="col-md-8"><span class="location">São Paulo</span> - <span class="temp">0</span></div>
        <div class="col-md-2 logo pull-right">
            <img src="https://orbital.company/assets/images/logo.svg">
        </div>
    </div>
</footer>
<script>
    
</script>
@yield('js')
</body>
</html>
