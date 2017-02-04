@extends('admin.layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Edit page</div>

    <div class="panel-body">
        {!! Html::ul($errors->all()) !!}

        {!! Form::model($page, ['url' => 'admin/pages/' . $page->id, 'files' => true]) !!}
            {{method_field('PATCH')}}

            @component('admin.pages.components.form')
                @slot('content')
                    <div class="form-group">
                        {!! Form::label('content', 'Content') !!}

                        <div id="editor">{!! $page->content !!}</div>
                        <input type="hidden" class="wysiwyg" name="content" value="{!! $page->content !!}">
                    </div>
                @endslot
                
                @slot('files')
                    {!! Form::label('background-current', 'Background') !!}
                    <img src="/uploads/{{$page->background}}" alt=""><br><br>

                    {!! Form::label('background', 'Upload new background') !!}
                    {!! Form::file('background', null, array('class' => 'form-control')) !!}
                    <br>
                @endslot
            @endcomponent
        {{ Form::close() }}
    </div>
</div>
@endsection