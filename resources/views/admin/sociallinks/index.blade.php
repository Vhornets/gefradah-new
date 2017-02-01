@extends('admin.layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif 
           
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-10">
                    Social links
                </div>

                <div class="col-xs-2 text-right">
                    <a href="{{ url('/admin/sociallinks/create') }}">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>
                            Href
                        </th>

                        <th>
                            Icon class
                        </th>

                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($sociallinks as $link)
                        <tr>
                            <td style="width: 50%">{{$link->href}}</td>
                            <td style="width: 40%">{{$link->icon_class}}</td>

                            <td>
                                <a href="{{ url('/admin/sociallinks/' . $link->id . '/edit') }}" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                            </td>
                            
                            <td>
                                {!! Form::model($link, array('url' => '/admin/sociallinks/' . $link->id)) !!}
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
    </div>
</div>
@endsection
