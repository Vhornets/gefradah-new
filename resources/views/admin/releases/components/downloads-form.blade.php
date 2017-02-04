<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('href', 'Href') !!}
    {!! Form::text('href', null, array('class' => 'form-control')) !!}
</div>                        

<div class="form-group">
    {!! Form::submit('Add', array('class' => 'btn btn-primary')) !!}
</div>