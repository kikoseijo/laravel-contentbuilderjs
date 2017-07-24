<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Template builder</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        @stack('stylesheets')
    </head>
    <body>
        @yield('content')
        @stack('scripts')
    </body>
</html>
