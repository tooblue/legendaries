<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroTraitPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_trait', function (Blueprint $table) {
            $table->integer('hero_id')->unsigned()->index();
            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('cascade');
            $table->integer('trait_id')->unsigned()->index();
            $table->foreign('trait_id')->references('id')->on('traits')->onDelete('cascade');
            $table->primary(['hero_id', 'trait_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hero_trait');
    }
}
