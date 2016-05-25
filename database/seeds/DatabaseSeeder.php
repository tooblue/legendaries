<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(BookTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(HeroesTableSeeder::class);
    }
}
