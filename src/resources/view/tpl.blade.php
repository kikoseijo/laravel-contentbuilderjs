<link href="{{ config('content-builder.style_css') }}" rel="stylesheet" type="text/css" />
<link href="{{ config('content-builder.content_css') }}" rel="stylesheet" type="text/css" />
<link href="{{ config('content-builder.contentbuilder_css') }}" rel="stylesheet" type="text/css" />
<link href="{{ config('content-builder.font_css') }}" rel="stylesheet" type="text/css" />
<link href="{{ config('content-builder.bootstrapcdn_css') }}" rel="stylesheet" type="text/css" />
<link href="{{ config('content-builder.googlefont_css') }}" rel="stylesheet" type="text/css" />
        
<script type="text/javascript" src="{{ config('content-builder.jquery') }}"></script>
<script type="text/javascript" src="{{ config('content-builder.jquery-ui') }}"></script>
<script type="text/javascript" src="{{ config('content-builder.contentbuilder-src') }}"></script>
<script type="text/javascript" src="{{ config('content-builder.saveimages') }}"></script>
<script type="text/javascript">

@if (isset($els))
        @foreach($els as $el)
        jQuery(document).ready(function ($) {
            $("#contentarea").contentbuilder({
                {!! json_encode(config('content-builder.'.$el)) !!}
            });
        });
        @endforeach
        @else
        jQuery(document).ready(function ($) {
                $("#contentarea").contentbuilder({                    
                    @foreach(config('content-builder.default') as $key=>$val)
                        {!! $key !!}: '{!! $val !!}',
                    @endforeach
                });
            });
@endif

</script>