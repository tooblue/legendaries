<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use GuzzleHttp\Client as Guzzle;

class DiscordBot extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Guzzle::class, function ($app) {
            return new Guzzle([
                'base_uri' => 'https://discordapp.com/api/',
                'query' => ['token' => config('discordbot.token')]
            ]);
        });
    }
}
