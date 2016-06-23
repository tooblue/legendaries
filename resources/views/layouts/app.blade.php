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

    <script>
        var session = {!! json_encode($session) !!}
    </script>
</head>

<body>
    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NTJT5K"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NTJT5K');</script>
    <!-- End Google Tag Manager -->

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
                        <li><a href="https://guide.legendaries.net">Guides</a></li>
                        <!--li class="login"><a href="#">Members</a></li>
                        <li><a href="#">Heroes</a></li>
                        <li><a href="#">Items</a></li-->
                        <li><a href="https://discordapp.com/channels/172354488613470208/172354488613470208">Chat</a></li>
                        <li class="login"><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> &nbsp; Logout</a></li>
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
