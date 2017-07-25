@if (config('content-builder-js.load_bootstrap'))
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
@endif
@if (config('content-builder-js.load_jquery'))
    <script type="text/javascript" src="{{ config('content-builder-js.jquery') }}"></script>
@endif
@if (config('content-builder-js.load_jquery_ui'))
    <script type="text/javascript" src="{{ config('content-builder-js.jquery-ui') }}"></script>
@endif
<script type="text/javascript" src="{{ config('content-builder-js.contentbuilderjs-src') }}"></script>
<script type="text/javascript" src="{{ config('content-builder-js.saveimages') }}"></script>
