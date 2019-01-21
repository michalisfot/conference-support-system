<?php
$userId = session()->get('id');
$role = session()->get('role');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Conference</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @include('inc.navbar')
        
    <div class="container">
        @if(Request::is('/'))
            @include('inc.showcase')
        @endif
        <div class="row">
            <div class="col-md8 col-lg-8">
                @include('inc.messages')
                @yield('content')
            </div>
            @if(Request::is('/'))
            <div class="col-md-4 col-lg-4">
                @include('inc.sidebar')
            </div>
            @endif
        </div>
    </div>
        
    <footer id="footer" class="text-center">
        <p>Copyright 2019 &copy; Conference</p>    
    </footer>
        
    </body>
</html>