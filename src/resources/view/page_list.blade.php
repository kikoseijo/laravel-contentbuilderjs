@extends(config('content-builder-js.default_layout'))

@section('content')
	@if (isset($templates))
		@foreach ($templates as $template)
			<ul>
				<li><a href="{{ route('template.edit',$templates->id) }}"></a>{!! $templates->name !!}</li>
			</ul>
		@endforeach
	@endif
@stop
