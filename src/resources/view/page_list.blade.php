@extends(config('content-builder-js.default_layout'))

@section('content')

	@include('content-builder-js::parts.tpl_add_template_btn')

	@if (isset($templates))
		@foreach ($templates as $template)
			<a href="{{ route('cb_template.edit',$template->id) }}">{!! $template->name !!}</a><br />
		@endforeach
	@endif

	@include('content-builder-js::parts.tpl_add_template_btn')

@stop
