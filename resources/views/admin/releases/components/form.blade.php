<div class="row">
    <div class="col-xs-5">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, array('class' => 'form-control')) !!}
    </div>
    
    <div class="col-xs-5">
        {!! Form::label('artist', 'Artist') !!}
        {!! Form::text('artist', null, array('class' => 'form-control')) !!}
    </div>
    
    <div class="col-xs-2">
        {!! Form::label('sort_order', 'Sort order') !!}
        {!! Form::number('sort_order', null, array('class' => 'form-control')) !!}
    <br>
    </div>
</div>

{{ $description }}

{{ $files }}

<div class="form-group">
    {!! Form::label('soundcloud_playlist', 'Soundcloud playlist') !!}
    {!! Form::text('soundcloud_playlist', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
</div>