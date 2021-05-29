<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_tournament_id1')->unsigned();
            $table->foreign('team_tournament_id1')->references('id')->on('team_tournament');
            $table->integer('team_tournament_id2')->unsigned();
            $table->foreign('team_tournament_id2')->references('id')->on('team_tournament');
            $table->integer('possesion1');
            $table->double('possesion2');
            $table->integer('shots1');
            $table->integer('shots2');
            $table->integer('goals1');
            $table->integer('goals2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stats');
    }
}
