<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('m_played')->unsigned()->default(0);
            $table->integer('m_lost')->unsigned()->default(0);
            $table->integer('m_won')->unsigned()->default(0);
            $table->integer('m_drawn')->unsigned()->default(0);
            $table->integer('goals')->unsigned()->default(0);
            $table->integer('goal_diff')->unsigned()->default(0);
            $table->integer('points')->unsigned()->default(0);
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
        Schema::dropIfExists('teams');
    }
}
