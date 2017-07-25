@extends(config('content-builder-js.default_layout'))

@section('content')

	@include('content-builder-js::parts.tpl_add_template_btn')

	<div class="box box-primary">
		<div class="box-body">
			<div class="table-responisve">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Template</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@if (isset($templates))
							@foreach ($templates as $template)
								<tr>
									<td>
										<a href="{{ route('cb_template.edit',$template->id) }}">{!! $template->name !!}</a><br />
									</td>
									<td>
										<a href="{{ route('cb_template.edit',$template->id) }}" class="btn btn-sm btn-primary"><i class="icon ion-edit"></i></a>
										<a href="{{ route('cb_template.delete',$template->id) }}" onclick="return confirm('Confirm permanent deletion?')" class="btn btn-sm btn-danger"><i class="icon ion-trash-a"></i></a>
									</td>
								</tr>
							@endforeach
						@endif

					</tbody>
				</table>
			</div>
		</div>
	</div>

	@include('content-builder-js::parts.tpl_add_template_btn')

@stop
