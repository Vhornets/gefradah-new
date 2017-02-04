@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="list-group">
                        <a href="{{url('/admin/releases')}}" class="list-group-item">
                            Releases
                        </a>

                        <a href="{{ url('/admin/pages') }}" class="list-group-item">
                            Pages
                        </a>

                        <a href="{{ url('/admin/menus') }}" class="list-group-item">
                            Menus
                        </a>
                    
                        <a href="{{ url('/admin/sociallinks') }}" class="list-group-item">
                            Social links
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
