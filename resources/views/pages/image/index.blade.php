@extends('layouts.main')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3>Load Image</h3>
    {!! Form::open(array('action' => 'ImageController@store', 'files' => true)) !!}
        {!! Form::hidden('type', $type) !!}
        {!! Form::hidden('id', $id) !!}
        <div class="form-group">
            {!! Form::text('name', '', array('placeholder' => 'Image name', 'class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::file('image', array('class' => 'form-control-file')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Load image', array('class' => 'btn  btn-primary')) !!}
        </div>
    {!! Form::close() !!}
@endsection