@extends(config('content-builder-js.default_layout'))

@section('content')

	@include('content-builder-js::parts.tpl_add_template_btn')

	@if (isset($templates))
		@foreach ($templates as $template)
			<ul>
				<li><a href="{{ route('cb_template.edit',$template->id) }}"></a>{!! $template->name !!}</li>
			</ul>
		@endforeach
	@endif

	@include('content-builder-js::parts.tpl_add_template_btn')

@stop
