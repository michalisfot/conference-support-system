@extends('layouts.app')

@section('content')
<h1>About the Conference</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, officia voluptatibus. Autem deleniti, alias nesciunt voluptas temporibus maiores labore, maxime dolores necessitatibus neque exercitationem nihil officia recusandae quia omnis voluptate.</p>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, officia voluptatibus. Autem deleniti, alias nesciunt voluptas temporibus maiores labore, maxime dolores necessitatibus neque exercitationem nihil officia recusandae quia omnis voluptate. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, officia voluptatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, officia voluptatibus.</p>
@endsection

@section('sidebar')
    @parent
    @if(count($announcements) > 0)
        <div id="accordion">
        @foreach($announcements as $announcement)
            <div class="card">
                <div class="card-header" id="heading{{$announcement->id}}">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$announcement->id}}" aria-expanded="true" aria-controls="collapse{{$announcement->id}}">
                      {{$announcement->title}}
                    </button>
                  </h5>
                </div>

                <div id="collapse{{$announcement->id}}" class="collapse" aria-labelledby="heading{{$announcement->id}}" data-parent="#accordion">
                  <div class="card-body">
                    {{$announcement->content}}
                  </div>
                </div>
            </div>
        @endforeach
        </div>
    @endif
@endsection
