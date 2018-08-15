<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rate_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('estate_id');
            $table->string('comment', 1000);
            $table->timestamps();

            $table->foreign('rate_id')->references('id')->on('rates');
            $table->foreign('user_id')->references('id')->on('areas');
            $table->foreign('estate_id')->references('id')->on('estates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
