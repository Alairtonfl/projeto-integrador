<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchs', function (Blueprint $table) {
          $table->increments('id');
          $table->date('date');
          $table->integer('team_tournament_id1')->unsigned();
          $table->foreign('team_tournament_id1')->references('id')->on('team_tournament');
          $table->integer('team_tournament_id2')->unsigned();
          $table->foreign('team_tournament_id2')->references('id')->on('team_tournament');
          $table->string('location');
          $table->integer('stats_id')->unsigned();
          $table->foreign('stats_id')->references('id')->on('stats');
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
        Schema::dropIfExists('matchs');
    }
}
