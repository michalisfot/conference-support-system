@extends('layouts.app')

@section('content')
    <h1>Contact</h1>
    {!! Form::open(['url' => 'announcements/submit']) !!}
        <div class="form-group">
            {!!Form::label('title', 'Title');!!}
            {!!Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter title']);!!}
        </div>
        <div class="form-group">
            {!!Form::label('content', 'Content');!!}
            {!!Form::textarea('content', '', ['class' => 'form-control', 'placeholder' => 'Enter content']);!!}
        </div>
        <div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
@endsection
