@extends('admin.layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">New social link</div>

        <div class="panel-body">
            {!! Html::ul($errors->all()) !!}

            {!! Form::model($sociallink, ['url' => 'admin/sociallinks']) !!}
                <div class="form-group">
                    {!! Form::label('href', 'Href') !!}
                    {!! Form::text('href', null, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('icon_class', 'Icon class') !!}
                    {!! Form::text('icon_class', null, array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
