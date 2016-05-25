<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTraitPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_trait', function (Blueprint $table) {
            $table->integer('book_id')->unsigned()->index();
            $table->foreign('book_id')->references('id')->on('book')->onDelete('cascade');
            $table->integer('trait_id')->unsigned()->index();
            $table->foreign('trait_id')->references('id')->on('traits')->onDelete('cascade');
            $table->primary(['book_id', 'trait_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('book_trait');
    }
}
