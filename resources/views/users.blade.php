@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    @if(count($users) > 0)
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Full Name</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <th scope="row">{{$user->fname}} {{$user->lname}}</th>
            <th scope="row">{{$user->email}}</th>
            {!! Form::open(['url' => 'deleteUser']) !!}
            {!!Form::text('id', $user->id, ['class'=>'hidden']);!!}
              <th scope="row">{{Form::submit('Delete', ['class'=>'btn btn-danger btn-sm'])}}</th>
            {!! Form::close() !!}
          </tr>
        @endforeach
      </tbody>
    </table>
    @endif
@endsection
