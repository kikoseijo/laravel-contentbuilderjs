@extends(config('content-builder-js.default_layout'))

@section('title', 'Edit custom block')

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <form action="{{ route('cb_block.save', isset($block) ? $block->id : null) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Block name') !!}
                            {!! Form::text('name', isset($block) ? $block->name : null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            {!! Form::label('category_id', 'Block Category') !!}
                            {!! Form::select('category_id', config('content-builder-js.categories'), isset($block) ? $block->category_id : null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('category_id') }}</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('item_image') ? ' has-error' : '' }}">
                            {!! Form::label('item_image', 'Block Image:') !!}
                            {!! Form::file('item_image') !!}
                            {{-- <p class="help-block">Will scale image to 300x300 and 150x150</p> --}}
                            <small class="text-danger">{{ $errors->first('item_image') }}</small>
                        </div>
                    </div>
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
        </div>
    </div>


@stop
