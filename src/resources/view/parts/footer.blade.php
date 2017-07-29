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

@if (config('content-builder-js.custom_blocks_enabled'))
    @foreach (config('content-builder-js.extraJsLibs') as $extraLib)
        <script type="text/javascript" src="{{ $extraLib }}"></script>
    @endforeach
    <script type="text/javascript" src="{{ config('content-builder-js.snippetJs') }}"></script>
@endif
