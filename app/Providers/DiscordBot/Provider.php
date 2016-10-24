<?php

namespace App\Providers\DiscordBot;

use Illuminate\Support\ServiceProvider;

use \App\Providers\DiscordBot\Client as DiscordBot;

class Provider extends ServiceProvider
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
        $this->app->singleton('\App\Providers\DiscordBot\Client', function ($app) {
            return new DiscordBot([
                'base_uri' => 'https://discordapp.com/api/',
				'query' => [],
				'headers' => [
					'Authorization' => 'Bot '.config('services.discordbot.token'),
				]
            ]);
        });
    }
}
