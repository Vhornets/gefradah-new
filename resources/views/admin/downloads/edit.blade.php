@extends('admin.layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="{{url('/admin/releases/' . $release->id . '/edit/')}}">
            <i class="glyphicon glyphicon-arrow-left"></i>
        </a>

        Edit download
    </div>

    <div class="panel-body">
        {!! Html::ul($errors->all()) !!}

        {!! Form::model($download, ['url' => 'admin/releases/' . $release->id . '/downloads/' . $download->id]) !!}
            {{method_field('PATCH')}}

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('href', 'Href') !!}
                {!! Form::text('href', null, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
