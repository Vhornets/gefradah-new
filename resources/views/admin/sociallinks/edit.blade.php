@extends('admin.layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Edit social link</div>

    <div class="panel-body">
        {!! Html::ul($errors->all()) !!}

        {!! Form::model($sociallink, ['url' => 'admin/sociallinks/' . $sociallink->id]) !!}
            {{method_field('PATCH')}}

            <div class="form-group">
                {!! Form::label('href', 'Href') !!}
                {!! Form::text('href', null, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('icon_class', 'Icon class') !!}
                {!! Form::text('icon_class', null, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
