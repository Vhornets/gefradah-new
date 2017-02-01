@extends('admin.layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">New page</div>

        <div class="panel-body">
            {!! Html::ul($errors->all()) !!}

            {!! Form::model($page, ['url' => 'admin/pages', 'files' => true]) !!}
                @component('admin.pages.components.form')
                    @slot('content')
                        <div class="form-group">
                            {!! Form::label('content', 'Content') !!}

                            <div id="editor">{!! $page->content !!}</div>
                            <input type="hidden" class="wysiwyg" name="content" value="{!! $page->content !!}">
                        </div>
                    @endslot
                    
                    @slot('files')
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
