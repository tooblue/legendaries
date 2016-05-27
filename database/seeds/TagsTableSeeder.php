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
        $tag->name = 'Fortress B5';
        $tag->short_name = 'F5';
        $tag->color = '358A00';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Fortress B6';
        $tag->short_name = 'F6';
        $tag->color = 'CAB100';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Mines B5';
        $tag->short_name = 'M5';
        $tag->color = 'E8B600';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Mines B6';
        $tag->short_name = 'M6';
        $tag->color = 'FF5A1B';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Glory Battlefield';
        $tag->short_name = 'G';
        $tag->color = '404040';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Dark Knight';
        $tag->short_name = 'D';
        $tag->color = '450084';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Champion Bulldozer';
        $tag->short_name = 'C';
        $tag->color = 'C12400';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'White';
        $tag->short_name = 'W';
        $tag->color = '009FC3';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Hellguru';
        $tag->short_name = 'H';
        $tag->color = '006B1C';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Punir';
        $tag->short_name = 'P';
        $tag->color = 'AF7900';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Tower of Treasures';
        $tag->short_name = 'T';
        $tag->color = 'A600B1';
        $tag->save();

        $tag = new Tag;
        $tag->name = 'Farming';
        $tag->short_name = 'F';
        $tag->color = 'D66D00';
        $tag->save();
    }
}
