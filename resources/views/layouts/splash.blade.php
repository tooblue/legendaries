<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Legendaries.net | Wonder Tactics Stuff &amp; Things</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/splash.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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

@if ( session('status') )
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ session('status') }}
    </div>
@endif

    <div class="site-wrapper">

        <div class="site-wrapper-inner">

            <div class="cover-container">

                <div class="masthead clearfix">
                    <div class="inner">
                        <h3 class="masthead-brand">
                            Legendaries.net
                        </h3>
                        <nav>
                            <ul class="nav masthead-nav">
                                <li><a href="https://guide.legendaries.net">Game Guides</a></li>
                                <li><a href="https://chat.legendaries.net">Guild Chat</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="inner cover">
                    <h1 class="cover-heading">
                        We are <strong>Legendary</strong>,
                    </h1>
                    <p class="lead">
                        a <strong>Wonder Tactics</strong> guild.
                    </p>
                    <p class="lead">
                        @yield('portal')
                    </p>
                </div>

                <div class="mastfoot">
                    <div class="inner">
                        <p>Interested in joining us? Sign up for <a href="https://discordapp.com">Discord</a> and send a DM to <strong>Mooofish#3340</strong>.</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="/js/splash.js"></script>
</body>
</html>
