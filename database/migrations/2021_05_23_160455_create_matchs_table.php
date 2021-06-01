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
          $table->integer('tournament_id')->unsigned();
          $table->foreign('tournament_id')->references('id')->on('tournament');
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
