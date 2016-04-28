<?php

namespace App\Providers\Discord;

use SocialiteProviders\Manager\SocialiteWasCalled;

class DiscordBotExtendSocialite
{
    /**
     * Execute the provider.
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('discordbot', __NAMESPACE__.'\DiscordBotProvider');
    }
}
