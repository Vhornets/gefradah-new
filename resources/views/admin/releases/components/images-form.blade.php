<div class="row">
    <div class="col-xs-12">
        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', null, array('class' => 'form-control')) !!}
        <br>
        {!! Form::label('title', 'Title') !!}
    </div>

    <div class="col-xs-10">
        {!! Form::text('title', null, array('class' => 'form-control')) !!}
    </div>
    
    <div class="col-xs-2 text-right">
        {!! Form::submit('Add', array('class' => 'btn btn-primary')) !!}
        <br><br><br>
    </div>
</div>