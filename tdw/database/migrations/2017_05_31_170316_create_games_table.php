<?php

/**
 * Created by PhpStorm.
 * User: montbs
 * Date: 29/05/17
 * Time: 21:20
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->unsignedInteger('idUser');
            $table->integer('score')->default(0);
            $table->string('gameBoard');
            $table->timestamps();
            $table->unique(['id', 'idUser']);
        });

        Schema::table('games', function (Blueprint $table) {
            $table->foreign('idUser')->references('id')
                ->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
