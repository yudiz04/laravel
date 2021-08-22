<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('templatefrontend.header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    @include('templatefrontend.navbar')
    @yield('content') 
    @include('templatefrontend.footer')
</body>
</html>  