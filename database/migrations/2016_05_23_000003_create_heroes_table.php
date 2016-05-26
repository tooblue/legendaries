<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('lvl')->default(30);
            $table->integer('grade')->default(4);
            $table->integer('powerup_lvl')->default(0);
            $table->integer('atk')->default(0);
            $table->integer('def')->default(0);
            $table->integer('hp')->default(0);
            $table->integer('spd')->default(0);
            $table->decimal('cr', 5, 2)->default(.1);
            $table->decimal('cd', 5, 2)->default(1);
            $table->decimal('pen', 5, 2)->default(0);
            $table->decimal('acc', 5, 2)->default(0);
            $table->decimal('eva', 5, 2)->default(.1);

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('book_id')->unsigned()->index();
            $table->foreign('book_id')->references('id')->on('book');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('heroes');
    }
}
