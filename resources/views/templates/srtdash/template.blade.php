<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema assinaturas - {{$title_page}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    @include('templates.srtdash.inc.stylesheets')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        @auth
            @include('templates.srtdash.inc.sidebar')
        @endauth
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area -->
            @auth
                @include('templates.srtdash.inc.headarea')
            @endauth
            
            <!-- page title area start -->
            @isset($title)
                @include('templates.srtdash.inc.pagearea')
            @endisset
            
            <!-- page title area end -->
            <div class="main-content-inner">
                @yield('content')
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2020. All right reserved for Linsper.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    
    <!-- scripts javascript -->
    @include('templates.srtdash.inc.scripts')
</body>

</html>