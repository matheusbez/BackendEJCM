<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('model');
            $table->string('color');
            $table->string('price');
            $table->unsignedBigInteger('dealership_id')->nullable();
            $table->timestamps();
        });

        //Foreign-Keys
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('dealership_id')->references('id')->on('dealerships')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}