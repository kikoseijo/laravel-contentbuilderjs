@extends(config('content-builder-js.default_layout'))

@section('content')




<form id="form1" action="{{ route('cb_block.save', isset($block) ? $block->id : null) }}" method="POST" style="display:none">
    {{ csrf_field() }}
	<input type="hidden" id="hidName" name="hidName" />
	<input type="hidden" id="hidTitle" name="hidTitle" />
	<input type="hidden" id="hidUrl" name="hidUrl" />
	<input type="hidden" id="hidContent" name="hidContent" />
	<input type="submit" id="btnPost" value="submit" />
</form>
