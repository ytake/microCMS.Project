<!DOCTYPE html>
<html lang="{{App::getLocale()}}" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <title>@yield('title', 'microCMS.Project')</title>
    <link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="apple-touch-icon-precomposed" href="/icon/favicon.png">
    <link rel="shortcut icon" href="/icon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/foundation/normalize.css">
    <link rel="stylesheet" href="/css/foundation/foundation.css">
    <link rel="stylesheet" href="/css/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="/css/app.css">
    @yield('styles')
</head>
<body>
@include('elements.header')
@yield('content')
@include('elements.footer')
<script src="/js/react-with-addons.min.js"></script>
<script src="/js/app.js"></script>
@yield('scripts')
</body>
</html>
