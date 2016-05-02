<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Legendaries</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/app.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="app">

        <nav id="navbar-top" class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="/">
                        <span class="logo fa-stack fa-lg">
                            <i class="fa fa-circle-o fa-stack-2x"></i>
                            <i class="fa fa-star-o fa-stack-1x"></i>
                        </span>
                        Legendaries.net &nbsp; <span class="sub">Wonder Tactics Stuff &amp; Things</span>
                    </a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <!--form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Database Search">
                        </div>
                    </form-->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/about">About</a></li>
                        <li><a href="https://guide.legendaries.net">Guides</a></li>
                        @if (!Auth::check())
                            <li class="login"><a href="{{ route('app::login') }}"><i class="fa fa-sign-in"></i> &nbsp; Guild Members Login</a></li>
                        @else
                            <!--li class="login"><a href="#">Members</a></li>
                            <li><a href="#">Heroes</a></li>
                            <li><a href="#">Items</a></li-->
                            <li class="login"><a href="https://discordapp.com/channels/172354488613470208/172354488613470208">Chat</a></li>
                            <li class="login"><a href="#"><i class="fa fa-power-off"></i> &nbsp; Logout</a></li>
                        @endif
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>


        <div id="main" class="container">

            @yield('content')

            <hr>

            <footer>
                <p class="text-center">
                    <small>
                        Copyright &copy; 2016 Legendaries.net
                    </small>
                </p>
            </footer>

        </div>
        <!-- /container -->

    </div>

    <script src="/js/app.js"></script>
</body>
</html>
