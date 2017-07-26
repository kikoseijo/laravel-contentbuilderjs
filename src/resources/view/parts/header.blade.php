@if (config('content-builder-js.load_bootstrap'))
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
@endif
<link href="{{ config('content-builder-js.content_css') }}" rel="stylesheet" type="text/css" />
@if (config('content-builder-js.use_custom_snippets'))
    <link href="{{ config('content-builder-js.custom_css') }}" rel="stylesheet" type="text/css" />
@endif
@if (config('content-builder-js.load_fontawesome'))
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endif
