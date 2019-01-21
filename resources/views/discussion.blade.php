@extends('layouts.app')

@section('content')
    <h1>Discussions</h1>
    @if(count($discussions) > 0)
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Subject</th>
          <th scope="col">Status</th>
          <th scope="col">User</th>
        </tr>
      </thead>
      <tbody>
        @foreach($discussions as $discussion)
          <tr>
            <th scope="row" style="vertical-align: inherit;">{{$discussion->id}}</th>
            {!! Form::open(['url' => 'messages']) !!}
            {!!Form::text('id', $discussion->id, ['class'=>'hidden']);!!}
            <th scope="row" style="vertical-align: inherit;">{{Form::submit($discussion->subject, ['class' => 'btn btn-link'])}}</th>
            {!! Form::close() !!}
            <th scope="row" style="vertical-align: inherit;">@if($discussion->closed)
                                Closed
                            @else
                                Open
                            @endif
            </th>
            <th scope="row" style="vertical-align: inherit;">{{$discussion->userId}}</th>
        @endforeach
      </tbody>
    </table>
    @endif
@endsection
