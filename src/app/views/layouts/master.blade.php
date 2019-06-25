<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="icon" href="{{asset("images/e.png")}}" type="image/gif">
</head>

<body>
{{--Navigation bar start--}}
<nav class="navbar navbar-default"></nav>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/" data-toggle="tooltip" data-placement="bottom"
           title="Escape Reality">Escapsim</a>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="profile" data-toggle="tooltip" data-placement="bottom"
                   title="Have you lost all memories of your responsibilities yet?">
                    <span class="glyphicon glyphicon-user"></span> Profile</a>
            </li>
            <li>
                <a href="blog" ><span class="glyphicon glyphicon-book"></span> Dev Blog</a>
            </li>
            <li>
                <form class="navbar-form navbar-left navbar-input-group" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </form>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <span class="glyphicon glyphicon-align-justify"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-warning-sign"></span> Report bug</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-info-sign"></span> FAQ</a></li>
                    <li><a href="#" data-toggle="tooltip" data-placement="bottom"
                           title="You'll be back ;)"><span class="glyphicon glyphicon-globe"></span> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
{{--Navigation bar end--}}
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="thumbnail">
                <img src="{{asset("images/1337.png")}}">
                <div class="caption">
                    <h3>Scott McMullan</h3>
                    <h3>Bio:</h3>
                    <p>I give more teabags than lipton.</p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>