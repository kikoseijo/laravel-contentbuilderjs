<link href="{{ config('content-builder-js.content_css') }}" rel="stylesheet" type="text/css" />
<link href="{{ config('content-builder-js.contentbuilder_css') }}" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{{ config('content-builder-js.jquery') }}"></script>
<script type="text/javascript" src="{{ config('content-builder-js.jquery-ui') }}"></script>
<script type="text/javascript" src="{{ config('content-builder-js.contentbuilderjs-src') }}"></script>
<script type="text/javascript" src="{{ config('content-builder-js.saveimages') }}"></script>

<script type="text/javascript">

@if (isset($els))
        @foreach($els as $el)
        jQuery(document).ready(function ($) {
            $("#contentarea").contentbuilder({
                {!! json_encode(config('content-builder-js.'.$el)) !!}
            });
        });
        @endforeach
@else
        jQuery(document).ready(function ($) {
                $("#contentarea").contentbuilder({
                    @foreach(config('content-builder-js.default') as $key=>$val)
                        {!! $key !!}: '{!! $val !!}',
                    @endforeach
                });
            });
@endif

</script>
