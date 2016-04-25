@extends('layouts.default')

@section('cover')

<div id="cover">
    <div class="container">

        <h1 class="text-center">Tradeposts made simple.</h1>

        <p class="text-center">Not your typical tradepost host. Say <strong>goodbye</strong> to fumbling with <em>hosting applications</em>, <em>FTP credentials</em>, <em>script installs</em>, &amp; <em>HTML/CSS/PHP code</em>.</p>

        <p class="lead text-center">Plus, Stash is 100% free to use, forever. <i class="fa fa-heart"></i></p>
        <p class="text-center"><a class="btn btn-primary inverse" href="#" role="button"><i class="fa fa-rocket"></i> &nbsp; Register to start playing today!</a></p>

    </div>
</div>

@endsection

@section('content')

<div class="buckets">

    <div class="row">
        <div class="col-xs-3">
            <i class="fa fa-smile-o"></i>
        </div>
        <div class="col-xs-9">
            <h2>Easy</h2>
            <p class="text-justify">Stash is an all-inclusive tradepost hosting solution. Stash keeps track of all of your cards and collections, helps you manage your trades, friends, and related communications, and it all <em>just works</em> out of the box. No complex script installs or coding knowledge required - once you have a Stash account, you can start playing and trading immediately!</p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-9">
            <h2>Flexible</h2>
            <p class="text-justify">It doesn't take much effort to start using Stash, but sometimes part of the fun is in customizing your collection. Stash allows you to add a bit of a personal touch to your tradepost out of the box, or if you've got some code savvy, you can display your cards <em>on your own website</em> by utilizing the simple <strong>Stash API</strong>.</p>
        </div>
        <div class="col-xs-3">
            <i class="fa fa-cogs"></i>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3">
            <i class="fa fa-lock"></i>
        </div>
        <div class="col-xs-9">
            <h2>Secure</h2>
            <p class="text-justify">Sharing server resources can be risky for both the host and hostees, and transfering files over unencrypted FTP is inherently insecure. Stash users access their data purely through the SSL encrypted web interface and API, meaning there is <em>much</em> less risk of other users (unintentionally or maliciously) breaking things or accessing your private data. You also don't have to worry about script updates or compatibility issues - we handle all of the maintenance, so you always have the latest and greatest tools at your fingertips!</p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-9">
            <h2>Connected</h2>
            <p class="text-justify">When you join Stash, you are instantly connected to a network of other oTCG players. Stash allows you to quickly and easily search through <em>all</em> Stash hosted tradeposts, and can (more) seamlessly manage trades between fellow Stash players. Got trade buddies? Add your preferred traders to your friends list, and Stash will give you a gentle nudge when you've picked up cards from their wishlists - and vice versa, of course. ;)</p>
        </div>
        <div class="col-xs-3">
            <i class="fa fa-users"></i>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3">
            <i class="fa fa-lightbulb-o"></i>
        </div>
        <div class="col-xs-9">
            <h2>Smart</h2>
            <p class="text-justify">Stash is developed and maintained by the creator of the popular <a href="https://filler00.com/project/easytcg">EasyTCG</a> tradepost script. EasyTCG was a game changer and quickly became the standard, but it was also imperfect and is beginning to show it's age. Developing EasyTCG was an invaluable learning experience, and thus Stash was built from the ground up utilizing years of accumulated research, knowledge and feedback to solve some of the oTCG community's biggest problems.</p>
        </div>
    </div>

</div>

@endsection
