<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('subtitle', 'Subtitle') !!}
    {!! Form::text('subtitle', null, array('class' => 'form-control')) !!}
</div>

{{ $content }}

{{ $files }}

<div class="form-group">
    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
</div>