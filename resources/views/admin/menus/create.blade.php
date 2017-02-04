@extends('admin.layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">New menu item</div>

    <div class="panel-body">
        {!! Html::ul($errors->all()) !!}

        {!! Form::model($menu, ['url' => 'admin/menus']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('href', 'Href') !!}
                {!! Form::text('href', null, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('external', 'External link?') !!}
                {!! Form::select('external', [0 => 'No', 1 => 'Yes'], 0, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
