@extends('admin.layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif 
           
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-10">
                    Releases
                </div>

                <div class="col-xs-2 text-right">
                    <a href="{{ url('/admin/releases/create') }}">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="panel-body">
            @foreach($releases as $release)
                <div class="row">
                    <div class="col-xs-5">
                        <img src="/uploads/{{$release->cover}}" alt="">
                    </div>

                    <div class="col-xs-6">
                        <a href="{{ url('/admin/releases/' . $release->id . '/edit') }}">
                            <h2>{{$release->artist}}</h2>
                            <h4>{{$release->title}}</h4>
                        </a>
                    </div>

                    <div class="col-xs-1">
                        {!! Form::model($release, array('url' => '/admin/releases/' . $release->id)) !!}
                            {{method_field('DELETE')}}

                            <button type="submit" class="btn btn-danger">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>
                        {{ Form::close() }}
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
