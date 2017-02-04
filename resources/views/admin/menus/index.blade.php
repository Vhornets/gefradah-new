@extends('admin.layouts.app')

@section('content')
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif 
       
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-10">
                Menus
            </div>

            <div class="col-xs-2 text-right">
                <a href="{{ url('/admin/menus/create') }}">
                    <i class="glyphicon glyphicon-plus"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        Title
                    </th>

                    <th>
                        Href
                    </th>

                    <th>
                        External?
                    </th>

                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td style="width: 40%">{{$menu->title}}</td>
                        <td style="width: 40%">{{$menu->href}}</td>
                        <td style="width: 10%">{{$menu->external}}</td>

                        <td>
                            <a href="{{ url('/admin/menus/' . $menu->id . '/edit') }}" class="btn btn-primary">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                        </td>
                        
                        <td>
                            {!! Form::model($menu, array('url' => '/admin/menus/' . $menu->id)) !!}
                                {{method_field('DELETE')}}

                                <button type="submit" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
