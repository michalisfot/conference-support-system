@extends('layouts.app')

@section('content')
    <h1>RE: {{$discussion->subject}}</h1>
    {!! Form::open(['url' => 'reply/submit']) !!}
        {!!Form::text('id', $discussion->id, ['class' => 'hidden']);!!}
        <div class="form-group">
            {!!Form::label('message', 'Reply');!!}
            {!!Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Enter reply']);!!}
        </div>
        <div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
@endsection
