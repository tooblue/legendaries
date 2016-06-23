<?php

namespace App;

use App\Providers\DiscordBot\Client as DiscordBot;

class Guild
{

    protected $bot;

    public function __construct(DiscordBot $bot)
    {
        $this->bot = $bot;
    }

    public function get()
    {
        $guild = $this->bot->get('guilds/' . $this->bot->guild_id)->getBody();

        return json_decode($guild);
    }

    public function members()
    {
        $members = $this->bot->get('guilds/' . $this->bot->guild_id . '/members', [
            'query' =>  array_merge(
                $this->bot->getConfig('query'),
                ['limit' => '1000']
             )
        ])->getBody();

        return json_decode($members);
    }

    public function member($id)
    {
        $member = $this->bot->get('guilds/' . $this->bot->guild_id . '/members/' . $id);

        if ( $member->getStatusCode() !== 200 )
            return false;

        return json_decode($member->getBody());
    }

    public function isApprovedMember($id)
    {
        $member = $this->member($id);
        if ( $member && in_array('173603789331365889', $member->roles) )
            return true;

        return false;
    }

    public function roles()
    {
        $roles = $this->bot->get('guilds/' . $this->bot->guild_id . '/roles')->getBody();

        return json_decode($roles);
    }
}
