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

                    <a class="navbar-brand" href="/">Stash &nbsp; <span>tradeposts</span></a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">TCGs</a></li>
                        <li><a href="#">Players</a></li>
                        <li><a href="https://forum.filler00.com" target="_blank">Forum</a></li>
                        <li><a href="{{ route('app::logout') }}">Logout &nbsp; <i class="fa fa-power-off"></i></a></li>
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
                        <a href="#">Privacy</a> &nbsp;&sdot;&nbsp; <a href="#">Terms</a> &nbsp;&sdot;&nbsp; <a href="#">Team</a> &nbsp;&sdot;&nbsp; <a href="#">Credits</a> &nbsp;&sdot;&nbsp; <a href="#">Contact</a>
                    </small>
                </p>
                <p class="text-center">
                    <small>
                        Stash &copy; 2015 Michelle Lewis.
                        <br>A <a href="https://filler00.com">Filler00</a> project. <i class="fa fa-heart-o"></i>
                    </small>
                </p>
            </footer>

        </div>
        <!-- /container -->

    </div>

    <script src="/js/app.js"></script>
</body>
</html>
