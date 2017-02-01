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
                    Pages
                </div>

                <div class="col-xs-2 text-right">
                    <a href="{{ url('/admin/pages/create') }}">
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
                            Slug
                        </th>

                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td style="width: 50%">{{$page->title}}</td>
                            <td style="width: 50%">{{$page->slug}}</td>

                            <td>
                                <a href="{{ url('/admin/pages/' . $page->id . '/edit') }}" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                            </td>

                            <td>
                                {!! Form::model($page, array('url' => '/admin/pages/' . $page->id)) !!}
                                    {{method_field('DELETE')}}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </button>
                                {{ Form::close() }}
                            </td>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
