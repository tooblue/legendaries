<?php

namespace App\Providers\DiscordBot;

use GuzzleHttp\Client as Guzzle;

class Client extends Guzzle
{
    public $guild_id;

    public function __construct(array $config = [])
    {
        $this->guild_id = config('services.discordbot.guild');

        parent::__construct($config);
    }

}
