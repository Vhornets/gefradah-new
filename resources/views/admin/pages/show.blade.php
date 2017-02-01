@extends('admin.layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            @foreach($releases as $release)
                <a href="{{ url('/admin/release/' . $release->id . '/edit') }}">
                    {{$release->title}}
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
