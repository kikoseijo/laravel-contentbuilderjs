@extends(config('content-builder-js.default_layout'))

@section('content')

    <form id="form1" action="{{ route('cb_block.save', isset($block) ? $block->id : null) }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Block name') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
        <div class="form-group{{ $errors->has('html') ? ' has-error' : '' }}">
            {!! Form::label('html', 'Block HTML') !!}
            {!! Form::textarea('html', isset($block) ? $block->html : null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('html') }}</small>
        </div>
        <div class="form-group{{ $errors->has('css') ? ' has-error' : '' }}">
            {!! Form::label('css', 'Block CSS') !!}
            {!! Form::textarea('css', isset($block) ? $block->css : null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('css') }}</small>
        </div>
        <div class="form-group{{ $errors->has('js') ? ' has-error' : '' }}">
            {!! Form::label('js', 'Block JS') !!}
            {!! Form::textarea('js', isset($block) ? $block->js : null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('js') }}</small>
        </div>
        <div class="text-center">
            <button type="submit" value="submit" class="btn btn-primary btn-lg">Save</button>
            <a href="{{ route('cb_block.list') }}" class="btn btn-default btn-lg">Back</a>
        </div>
    </form>

@stop
