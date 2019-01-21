@extends('layouts.app')

@section('content')
<h1>Profile</h1>


<div class="container col-md-8">
    {!! Form::open(['url' => 'profile/update']) !!}
        {!!Form::text('id', $user->id, ['class' => 'hidden']);!!}
        <div class="form-group">
            {!!Form::label('fname', 'First name');!!}
            {!!Form::text('fname', $user->fname, ['class' => 'form-control', 'placeholder' => $user->fname]);!!}
        </div>        
        <div class="form-group">
            {!!Form::label('lname', 'Last name');!!}
            {!!Form::text('lname', $user->lname, ['class' => 'form-control', 'placeholder' => $user->lname]);!!}
        </div>
        <div class="form-group">
            {!!Form::label('email', 'E-Mail Address');!!}
            {!!Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => $user->email]);!!}
        </div>
        <div class="form-group">
            {!!Form::label('password', 'Change your password');!!}
            {!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter your new password']);!!}
        </div>
        <div class="form-group">
            {!!Form::label('picture', 'Add a picture (link)');!!}
            {!!Form::text('picture', '', ['class' => 'form-control', 'placeholder' => 'Enter link for picture']);!!}
        </div>
        <div class="form-group">
            {!!Form::label('university', 'Choose your university');!!}
            {!!Form::select('university', $university, null, ['class' => 'form-control']);!!}
        </div>
        <div class="form-group">
            {!!Form::label('department', 'Department');!!}
            {!!Form::text('department', '', ['class' => 'form-control', 'placeholder' => 'Enter your department']);!!}
        </div>
        <div class="form-group">
            {!!Form::label('social', 'Add your social media');!!}
            <div class="row">
                <div class="col-md-6">
                    {!!Form::select('socialType', ['facebook' => 'Facebook','linkedin' => 'LinkedIn','twitter' => 'Twitter','instagram' => 'Instagram'], null, ['class' => 'form-control']);!!}
                </div>
                <div class="col-md-6">
                    {!!Form::text('social', '', ['class' => 'form-control', 'placeholder' => 'Enter your profile link']);!!}
                </div>
            </div>
         </div>
        <div>
            {{Form::submit('Update Profile', ['class'=>'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
		</div>
@endsection
