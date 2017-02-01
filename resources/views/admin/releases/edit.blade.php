@extends('admin.layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Edit release</div>

        <div class="panel-body">
            {!! Html::ul($errors->all()) !!}

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#general" data-toggle="tab">General</a>
                </li>

                <li role="presentation">
                    <a href="#downloads" data-toggle="tab">Downloads</a>
                </li>

                <li role="presentation">
                    <a href="#images" data-toggle="tab">Images</a>
                </li>
            </ul>

            <div class="tab-content">
                <br>
                <div role="tabpanel" class="tab-pane active" id="general">
                    {!! Form::model($release, ['url' => 'admin/releases/' . $release->id, 'files' => true]) !!}
                        {{method_field('PATCH')}}

                        @component('admin.releases.components.form')
                            @slot('description')
                                <div class="form-group">
                                    {!! Form::label('description', 'Description') !!}

                                    <div id="editor">{!! $release->description !!}</div>
                                    <input type="hidden" class="wysiwyg" name="description" value="{{$release->description}}">
                                </div>                        
                            @endslot
                            
                            @slot('files')
                                <div class="row">
                                    <div class="col-xs-6">
                                        {!! Form::label('cover-current', 'Cover') !!}
                                        <img src="/uploads/{{$release->cover}}" alt=""><br><br>
                                        
                                        {!! Form::label('cover', 'Upload new cover') !!}
                                        {!! Form::file('cover', null, array('class' => 'form-control')) !!}
                                    </div>

                                    <div class="col-xs-6">
                                        {!! Form::label('background-current', 'Background') !!}
                                        <img src="/uploads/{{$release->background}}" alt=""><br><br>

                                        {!! Form::label('background', 'Upload new background') !!}
                                        {!! Form::file('background', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <br>
                            @endslot
                        @endcomponent
                    {{ Form::close() }}
                </div>

                <div role="tabpanel" class="tab-pane" id="downloads">
                    <h2>Add new download link</h2>
                    
                    {!! Form::model($release->downloads, ['url' => 'admin/releases/' . $release->id . '/downloads']) !!}
                        @component('admin.releases.components.downloads-form')
                        @endcomponent
                    {{ Form::close() }}
                    <br>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Title
                                </th>

                                <th>
                                    Link
                                </th>

                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($release->downloads as $download)
                                <tr>
                                    <td style="width: 20%">{{$download->title}}</td>
                                    <td style="width: 74%">{{$download->href}}</td>

                                    <td>
                                        <a href="{{ url('/admin/releases/' . $release->id . '/downloads/' . $download->id . '/edit') }}" class="btn btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>

                                    <td>
                                        {!! Form::model($release, array('url' => '/admin/releases/' . $release->id . '/downloads/' . $download->id)) !!}
                                            {{method_field('DELETE')}}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="glyphicon glyphicon-remove"></i>
                                            </button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div role="tabpanel" class="tab-pane" id="images">
                    <h2>Add new image</h2>
                    
                    {!! Form::model($release->downloads, ['url' => 'admin/releases/' . $release->id . '/images', 'files' => true]) !!}
                        @component('admin.releases.components.images-form')
                        @endcomponent
                    {{ Form::close() }}
                    <br>

                    <div class="row">
                        @foreach($release->images as $image)
                            <div class="col-xs-6">
                                <div class="release-image">                                
                                    <img src="/uploads/{{$image->image}}">

                                    <div class="release-image__controls">
                                        <div class="col-xs-7">
                                            <h5>{{$image->title}}</h5>
                                        </div>

                                        <div class="col-xs-5 text-right">
                                            <a href="{{ url('/admin/releases/' . $release->id . '/images/' . $image->id . '/edit') }}" class="btn btn-primary">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </a>
                                            
                                            {!! Form::model($release, array('url' => '/admin/releases/' . $release->id . '/images/' . $image->id)) !!}
                                                {{method_field('DELETE')}}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="glyphicon glyphicon-remove"></i>
                                                </button>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection