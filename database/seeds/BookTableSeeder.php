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
        // Tiuriel
        $book = new Book;
        $type = App\Type::where('name', 'attack')->first();
        $attribute = App\Attribute::where('name', 'earth')->first();

        $book->name = 'Tiuriel';
        $book->grade = 4;
        $book->type()->associate($type);
        $book->attribute()->associate($attribute);
        $book->save();

        // Fire Dragon
        $book = new Book;
        $type = App\Type::where('name', 'attack')->first();
        $attribute = App\Attribute::where('name', 'fire')->first();

        $book->name = 'Fire Dragon';
        $book->grade = 4;
        $book->legendary = true;
        $book->type()->associate($type);
        $book->attribute()->associate($attribute);
        $book->save();

        // Miss Cheery
        $book = new Book;
        $type = App\Type::where('name', 'support')->first();
        $attribute = App\Attribute::where('name', 'water')->first();

        $book->name = 'Miss Cheery';
        $book->grade = 6;
        $book->type()->associate($type);
        $book->attribute()->associate($attribute);
        $book->save();

        // Heavenly Spider
        $book = new Book;
        $type = App\Type::where('name', 'attack')->first();
        $attribute = App\Attribute::where('name', 'light')->first();

        $book->name = 'Heavenly Spider';
        $book->grade = 2;
        $book->type()->associate($type);
        $book->attribute()->associate($attribute);
        $book->save();

        // Dinamis
        $book = new Book;
        $type = App\Type::where('name', 'defense')->first();
        $attribute = App\Attribute::where('name', 'dark')->first();

        $book->name = 'Dinamis';
        $book->grade = 4;
        $book->type()->associate($type);
        $book->attribute()->associate($attribute);
        $book->save();
    }
}
