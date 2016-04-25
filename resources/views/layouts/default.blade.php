<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{ STASH } &nbsp; The oTCG Tradepost Hub</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/default.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="app">
        @include('common.errors')

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
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">TCGs</a></li>
                        <li><a href="#">Players</a></li>
                        <li><a href="#">Forum</a></li>
                        <li class="login"><a href="/login" data-toggle="modal" data-target="#login-modal">Log In</a></li>
                        <li><a class="btn btn-primary navbar-btn inverse" href="/register" role="button" data-toggle="modal" data-target="#register-modal">Join</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>

        @yield('cover')

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
                        <br>A <a href="https://filler00.com">Filler00</a> project.
                    </small>
                </p>
            </footer>

        </div>
        <!-- /container -->

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal-label">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    @include('modals.login')
                </div>
            </div>
        </div>

        <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="register-modal-label">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    @include('modals.register')
                </div>
            </div>
        </div>

    </div>

    <script src="/js/default.js"></script>
</body>
</html>
