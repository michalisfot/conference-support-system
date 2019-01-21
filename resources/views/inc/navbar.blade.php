<nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Conference</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Conference</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{Request::is('/') ? 'active' : ''}}"><a href="/">Home</a></li>
                <li class="{{Request::is('about') ? 'active' : ''}}"><a href="/about">About</a></li>
                <li class="{{Request::is('contact') ? 'active' : ''}}"><a href="/contact">Contact</a></li>
                @if($role=='secretary')
                    <li class="{{Request::is('messages') ? 'active' : ''}}"><a href="/discussion">Discussions</a></li>
                    <li class="{{Request::is('users') ? 'active' : ''}}"><a href="/users">Users</a></li>
                    <li class="{{Request::is('announcements') ? 'active' : ''}}"><a href="/announcements">Announcements</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
            @if($userId>0)
                <li><a href="/profile">My Profile</a></li>
                <li><a href="/logout">Logout</a></li>
            @else
                <li><a href="/register">Register</a></li>
                <li><a href="/login">Login</a></li>
            @endif
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>