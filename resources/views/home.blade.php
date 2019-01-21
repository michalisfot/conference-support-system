@extends('layouts.app')

@section('content')
<h1>About the Conference</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, officia voluptatibus. Autem deleniti, alias nesciunt voluptas temporibus maiores labore, maxime dolores necessitatibus neque exercitationem nihil officia recusandae quia omnis voluptate.</p>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, officia voluptatibus. Autem deleniti, alias nesciunt voluptas temporibus maiores labore, maxime dolores necessitatibus neque exercitationem nihil officia recusandae quia omnis voluptate. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, officia voluptatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, officia voluptatibus.</p>
@endsection

@section('sidebar')
    @parent
    @if(count($announcements) > 0)
        @foreach($announcements as $announcement)
            <ul class="list-group">
                <li class="list-group-item">{{$announcement->title}}<br><hr>{{$announcement->content}}</li>
            </ul>
        @endforeach
    @endif
@endsection
