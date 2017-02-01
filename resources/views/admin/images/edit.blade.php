@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{url('/admin/releases/' . $release->id . '/edit/')}}">
                        <i class="glyphicon glyphicon-arrow-left"></i>
                    </a>

                    Edit image
                </div>

                <div class="panel-body">
                    {!! Html::ul($errors->all()) !!}

                    {!! Form::model($image, ['url' => 'admin/releases/' . $release->id . '/images/' . $image->id, 'files' => true]) !!}
                        {{method_field('PATCH')}}

                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, array('class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('image-current', 'Image') !!}
                            <img src="/uploads/{{$image->image}}" alt=""><br><br>
                            
                            {!! Form::label('image', 'Upload new image') !!}
                            {!! Form::file('image', null, array('class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
