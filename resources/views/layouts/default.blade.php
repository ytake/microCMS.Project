<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/github.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    @yield('content')
</div>
@yield('scripts')
</body>
</html>
