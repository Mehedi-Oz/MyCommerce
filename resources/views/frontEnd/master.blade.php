<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>My Commerce - @yield('title')</title>
    @include('frontEnd.include.style')
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="https://browsehappy.com/">upgrade your browser</a> to improve
    your experience and security.
</p>
<![endif]-->

@include('frontEnd.include.header')

@yield('body')

@include('frontEnd.include.footer')

@include('frontEnd.include.script')

</body>

</html>
