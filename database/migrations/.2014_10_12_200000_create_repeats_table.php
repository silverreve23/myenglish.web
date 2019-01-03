<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repeats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');
            $table->string('word')->nullable();
            $table->string('trans')->nullable();
            $table->string('hint')->nullable('no');
            $table->string('image')->nullable();
            $table->tinyInteger('wordlang')->default('en');
            $table->tinyInteger('translang')->default('ua');
            $table->integer('priority')->default(0);
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
        Schema::dropIfExists('repeats');
    }
}
