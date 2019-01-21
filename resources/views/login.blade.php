@extends('layouts.app')

@section('content')
    <h1>Login</h1>
    {!! Form::open(['url' => 'login/submit']) !!}
        <div class="form-group">
            {!!Form::label('email', 'E-Mail Address');!!}
            {!!Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter email']);!!}
        </div>
        <div class="form-group">
            {!!Form::label('password', 'Password');!!}
            {!!Form::password('password', '', ['class' => 'form-control', 'placeholder' => 'Enter password']);!!}
        </div>
        <div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
@endsection
