<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert(['name' => 'fire']);
        DB::table('attributes')->insert(['name' => 'water']);
        DB::table('attributes')->insert(['name' => 'earth']);
        DB::table('attributes')->insert(['name' => 'light']);
        DB::table('attributes')->insert(['name' => 'dark']);
    }
}
