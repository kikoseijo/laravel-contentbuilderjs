<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Template builder</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        @include('content-builder-js::parts.header')
        @stack('stylesheets')
    </head>
    <body>
        @yield('content')
        @include('content-builder-js::parts.footer')
        @stack('scripts')
    </body>
</html>
