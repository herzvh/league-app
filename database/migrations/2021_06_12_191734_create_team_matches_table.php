<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_matches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('match_id')->unsigned();
            $table->enum('type',['local','visitor']);
            $table->integer('score')->default(0);
            $table->integer('ft_score')->default(0);
            $table->integer('et_score')->default(0);
            $table->integer('pen_score')->default(0);
            $table->foreign('team_id')->on('teams')->references('id');
            $table->foreign('match_id')->on('matches')->references('id');
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
        Schema::dropIfExists('team_matches');
    }
}
