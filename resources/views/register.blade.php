@extends('layouts.app')

@section('content')
    <h1>Register</h1>
    {!! Form::open(['url' => 'register/submit']) !!}
        <div class="form-group">
            {!!Form::label('fname', 'First Name');!!}
            {!!Form::text('fname', '', ['class' => 'form-control', 'placeholder' => 'Enter your first name']);!!}
        </div>
        <div class="form-group">
            {!!Form::label('lname', 'Last Name');!!}
            {!!Form::text('lname', '', ['class' => 'form-control', 'placeholder' => 'Enter your last name']);!!}
        </div>
        <div class="form-group">
            {!!Form::label('email', 'E-Mail Address');!!}
            {!!Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter your email']);!!}
        </div>
        <div class="form-group">
            {!!Form::label('password', 'Password');!!}
            {!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Choose your password']);!!}
        </div>
        <div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
@endsection
