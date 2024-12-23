<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin-asset')}}/assets/images/favicon.png">
    <title>Admin - @yield('title')</title>

    @include('admin.include.style')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue fixed-layout">

<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Elite Admin</p>
    </div>
</div>

<div id="main-wrapper">

    @include('admin.include.header')

    @include('admin.include.left-sidebar')

    <div class="page-wrapper">

        <div class="container-fluid">

            @yield('body')

        </div>

    </div>

    @include('admin.include.footer')

</div>

<script src="{{asset('admin-asset')}}/assets/node_modules/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('admin-asset')}}/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('admin-asset')}}/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="{{asset('admin-asset')}}/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{asset('admin-asset')}}/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="{{asset('admin-asset')}}/dist/js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{asset('admin-asset')}}/assets/node_modules/raphael/raphael-min.js"></script>
<script src="{{asset('admin-asset')}}/assets/node_modules/morrisjs/morris.min.js"></script>
<script src="{{asset('admin-asset')}}/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Popup message jquery -->
<script src="{{asset('admin-asset')}}/assets/node_modules/toast-master/js/jquery.toast.js"></script>
<!-- Chart JS -->
<script src="{{asset('admin-asset')}}/dist/js/dashboard1.js"></script>
<script src="{{asset('admin-asset')}}/assets/node_modules/toast-master/js/jquery.toast.js"></script>
</body>


</html>
