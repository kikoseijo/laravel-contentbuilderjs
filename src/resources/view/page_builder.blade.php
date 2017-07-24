@extends(config('content-builder-js.default_layout'))

@section('content')

<div style="background:#eaeaea;float:left;width:100%">
    <div id="headerarea" class="is-container container">
		@if(Session::has('myHeader'))
			{!! Session::get('myHeader') !!}
		@else
			<div class="row clearfix">
		  		<div class="column full">
		  			<div class="display">
						<h1>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h1>
					</div>
		  		</div>
	  		</div>
		@endif
    </div>
</div>

<!-- CONTENT -->
<div style="background:#f7f7f7;float:left;width:100%">
	<div id="contentarea" class="is-container container">
		@if(Session::has('myContent'))
			{!! Session::get('myContent') !!}
		@else
			<div class="row clearfix">
			    <div class="column full">
			        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
			            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus leo ante, consectetur sit amet vulputate vel, dapibus sit amet lectus.</p>
			    </div>
			</div>
		@endif
	</div>
</div>

<form id="form1" target="{{ route('template.save') }}" method="post" style="display:none">
	<input type="hidden" id="hidHeader" name="hidHeader" />
	<input type="hidden" id="hidContent" name="hidContent" />
	<input type="submit" id="btnPost" value="submit" />
</form>

<div id="panelCms">
    <button onclick="save()" class="btn btn-primary"> Save </button>
</div>

@stop

@push('stylesheets')
  <link href="{{ config('content-builder-js.content_css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ config('content-builder-js.contentbuilder_css') }}" rel="stylesheet" type="text/css" />
  <style media="screen">
      .is-container {  margin: 90px auto; max-width: 1050px; width:100%; padding:55px 35px; box-sizing:border-box; }
      @media all and (max-width: 1080px) {
          .is-container { margin:0; }
      }
      body {margin:0 0 57px} /* give space 70px on the bottom for panel */
      #panelCms {width:100%;height:57px;border-top: #eee 1px solid;background:rgba(255,255,255,0.95);position:fixed;left:0;bottom:0;padding:10px;box-sizing:border-box;text-align:center;white-space:nowrap;z-index:10001;}
      #panelCms button {border-radius:4px;padding: 10px 15px;text-transform:uppercase;font-size: 11px;letter-spacing: 1px;line-height: 1;}
  </style>
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
	    function save() {
	        //Save all images first
	        $("body").saveimages({
	            handler: '/vendor/content-builder-js/saveimage.php',
	            onComplete: function () {
	                //Then save the content
					var sHeader = $('#headerarea').data('contentbuilder').html(); //Get header
	                var sContent = $('#contentarea').data('contentbuilder').html(); //Get content
					$('#hidHeader').val(sHeader);
	                $('#hidContent').val(sContent);
	                $('#btnPost').click();
	            }
	        });
	        $("body").data('saveimages').save();
	        $("html").fadeOut(1000);
	    }
	</script>
@endpush
