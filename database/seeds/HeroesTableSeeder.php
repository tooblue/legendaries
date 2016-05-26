<?php

use Illuminate\Database\Seeder;

use App\Hero;

class HeroesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add a hero for missaoi
        $hero = new Hero;
        $user = App\User::where('discord_id', '172053554113019904')->first();
        $book = App\Book::where('name', 'Tiuriel')->first();
        $tag = App\Tag::where('name', 'Farming')->first();

        $hero->user()->associate($user);
        $hero->book()->associate($book);

        $hero->save();

        $hero->tags()->attach($tag->id);

        // Add a hero for Horo
        $hero = new Hero;
        $user = App\User::where('discord_id', '172113073514086401')->first();
        $book = App\Book::where('name', 'Fire Dragon')->first();
        $tag = App\Tag::where('name', 'Arena')->first();

        $hero->user()->associate($user);
        $hero->book()->associate($book);

        $hero->save();

        $hero->tags()->attach($tag->id);
    }
}
