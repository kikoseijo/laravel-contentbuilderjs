<!-- Hidden Form Fields to post content -->
<form id="form1" method="post" style="display:none">
	<input type="hidden" id="hidHeader" name="hidHeader" />
	<input type="hidden" id="hidContent" name="hidContent" />
	<input type="submit" id="btnPost" value="submit" />
</form>

<!-- CUSTOM PANEL (can be used for "save" button or your own custom buttons) -->
<div id="panelCms">
    <button onclick="save()" class="btn btn-primary"> Save </button>
</div>


@push('stylesheets')
  <link href="{{ config('content-builder-js.content_css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ config('content-builder-js.contentbuilder_css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
  @if (config('content-builder-js.load_jquery'))
    <script type="text/javascript" src="{{ config('content-builder-js.jquery') }}"></script>
  @endif
  @if (config('content-builder-js.load_jquery_ui'))
    <script type="text/javascript" src="{{ config('content-builder-js.jquery-ui') }}"></script>
  @endif
  <script type="text/javascript" src="{{ config('content-builder-js.contentbuilderjs-src') }}"></script>
  <script type="text/javascript" src="{{ config('content-builder-js.saveimages') }}"></script>

@endpush


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
