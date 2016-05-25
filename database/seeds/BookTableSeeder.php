<?php

use Illuminate\Database\Seeder;

use App\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = new Book;
        $type = App\Type::where('name', 'attack')->first();
        $attribute = App\Attribute::where('name', 'earth')->first();

        $book->name = 'Tiuriel';
        $book->type()->associate($type);
        $book->attribute()->associate($attribute);
        $book->save();
    }
}
