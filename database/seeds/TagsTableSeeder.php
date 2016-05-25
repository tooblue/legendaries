<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag;
        $tag->name = 'Fort B5';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Fort B6';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Mines B5';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Mines B6';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Arena';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Dark Knight';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Champion Bulldozer';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'White';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Hellguru';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Punir';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'ToT';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Farming';
        $tag->save();
    }
}
