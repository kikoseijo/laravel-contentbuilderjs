@extends(config('content-builder-js.default_layout'))

@section('title', 'Edit template')

@section('content')

<div style="background:#eaeaea;float:left;width:100%">
    <div class="container-fluid">
        <form class="form-horizontal">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Template name', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('name', isset($template) ? $template->name : null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Template title', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('title', isset($template) ? $template->title : null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                    {!! Form::label('url', 'Template Url', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('url', isset($template) ? $template->url : null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('url') }}</small>
                    </div>
                </div>
                <div class="col-sm-9 col-sm-offset-3">
                    <a href="{{route('cb_template.list')}}" class="btn btn-lg btn-default">Back </a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- CONTENT -->
<div style="background:#f7f7f7;float:left;width:100%">
	<div id="contentarea" class="is-container container-fluid">
		@if(isset($template))
            {!!$template->html!!}
		@else
			<div class="row">
			    <div class="col-md-12">
			        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
			            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus leo ante, consectetur sit amet vulputate vel, dapibus sit amet lectus.</p>
			    </div>
			</div>
		@endif
	</div>
</div>

<form id="form1" action="{{ route('cb_template.save', isset($template) ? $template->id : null) }}" method="POST" style="display:none">
    {{ csrf_field() }}
	<input type="hidden" id="hidName" name="hidName" />
	<input type="hidden" id="hidTitle" name="hidTitle" />
	<input type="hidden" id="hidUrl" name="hidUrl" />
	<input type="hidden" id="hidContent" name="hidContent" />
	<input type="submit" id="btnPost" value="submit" />
</form>

<div id="panelCms">
    <button onclick="save()" class="btn btn-primary"> Save </button>
</div>

@stop

@push('stylesheets')
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
					var sName = $('#name').val(); //Get header
					var sTitle = $('#title').val(); //Get header
					var sUrl = $('#url').val(); //Get header
	                var sContent = $('#contentarea').data('contentbuilder').html(); //Get content
					//$('#hidHeader').val(sHeader);
	                $('#hidName').val(sName);
	                $('#hidTitle').val(sTitle);
	                $('#hidUrl').val(sUrl);
	                $('#hidContent').val(sContent);
	                $('#btnPost').click();
	            }
	        });
	        $("body").data('saveimages').save();
	        $("html").fadeOut(1000);
	    }
	</script>
@endpush
