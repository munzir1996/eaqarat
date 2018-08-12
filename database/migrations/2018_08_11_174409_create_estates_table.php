
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('area_id');
            $table->unsignedInteger('rate_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('price');
            $table->string('status');//default
            $table->string('image');
            $table->string('description', 1000);
            $table->string('type');//choosen
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('rate_id')->references('id')->on('rates');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estates');
    }
}
