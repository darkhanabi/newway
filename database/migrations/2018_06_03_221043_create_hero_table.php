<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->default('');
            $table->string('class', 50)->default('');
            $table->string('role', 50)->default('');
            $table->integer('hit_points')->default(1);
            $table->integer('attack')->default(1);
            $table->integer('defense')->default(1);
            $table->integer('attack_speed')->default(1);
            $table->integer('move_speed')->default(1);
            $table->string('image', 50)->default('');
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
        Schema::dropIfExists('Hero');
    }
}
