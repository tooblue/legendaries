<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();
            $table->integer('grade')->default(4);
            $table->boolean('legendary')->default(false);

            $table->integer('atk')->default(0);
            $table->integer('def')->default(0);
            $table->integer('hp')->default(0);
            $table->integer('spd')->default(0);

            $table->integer('attribute_id')->unsigned()->index();
            $table->foreign('attribute_id')->references('id')->on('attributes');

            $table->integer('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('book');
    }
}
