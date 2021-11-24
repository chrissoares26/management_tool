<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Super Management - @yield('title')</title>
        <meta charset="utf-8">
    
        <link rel="stylesheet" href="{{ asset('css/basic.css') }}">
    </head>

    <body>
    @include('site.layouts._partials.top')
    @yield('content')

    </body>
</html>