<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert(['name' => 'attack']);
        DB::table('types')->insert(['name' => 'support']);
        DB::table('types')->insert(['name' => 'defense']);
    }
}
