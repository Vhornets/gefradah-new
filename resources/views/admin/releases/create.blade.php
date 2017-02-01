@extends('admin.layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">New release</div>

        <div class="panel-body">
            {!! Html::ul($errors->all()) !!}

            {!! Form::model($release, ['url' => 'admin/releases', 'files' => true]) !!}
                @component('admin.releases.components.form')
                    @slot('description')
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}

                            <div id="editor">{!! $release->description !!}</div>
                            <input type="hidden" class="wysiwyg" name="description" value="{{$release->description}}">
                        </div>                            
                    @endslot
                    
                    @slot('files')
                        <div class="form-group">
                            {!! Form::label('cover', 'Cover') !!}
                            {!! Form::file('cover', null, array('class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('background', 'Background') !!}
                            {!! Form::file('background', null, array('class' => 'form-control')) !!}
                        </div>
                    @endslot
                @endcomponent
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
