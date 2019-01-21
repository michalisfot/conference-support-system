@extends('layouts.app')

@section('content')
    <h1>Messages</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Subject</th>
          <th scope="col">Status</th>
          <th scope="col" style="text-align: center;">Action</th>
        </tr>
      </thead>
    <tbody>
    <tr>
        <th scope="row" style="vertical-align: inherit;">{{$discussion->subject}}</th>
        <th scope="row" style="vertical-align: inherit;">
            @if($discussion->closed)
                Closed
            @else
                Open
            @endif
        </th>
        {!! Form::open(['url' => 'closeDiscussion']) !!}
            {!!Form::text('id', $discussion->discussionId, ['class'=>'hidden']);!!}
            @if($discussion->closed)
                <th scope="row">{{Form::submit('Open', ['class'=>'btn btn-success btn-sm col-md-6'])}}
            @else
                <th scope="row">{{Form::submit('Close', ['class'=>'btn btn-danger btn-sm col-md-6'])}}
            @endif
        {!! Form::close() !!}
        {!! Form::open(['url' => 'reply']) !!}
            {!!Form::text('id', $discussion->discussionId, ['class'=>'hidden']);!!}
            {{Form::submit('Reply', ['class'=>'btn btn-info btn-sm col-md-6'])}}</th>
        {!! Form::close() !!}
    </tbody>
    </table>
        
    @if(count($messages) > 0)
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Message</th>
          <th scope="col">Time</th>
          <th scope="col">User</th>
        </tr>
      </thead>
      <tbody>
        @foreach($messages as $message)
          <tr>
            <th scope="row">{{$message->message}}</th>
            <th scope="row">{{$message->timestamp}}</th>
            <th scope="row">{{$message->userId}}</th>
        @endforeach
      </tbody>
    </table>
    @endif
@endsection
