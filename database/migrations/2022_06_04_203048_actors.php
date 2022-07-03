<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actors', function (Blueprint $table) {
            $table->engine="InnoDB";
            
            $table->bigIncrements('id');
            $table->bigInteger('sex_id')->unsigned();
            $table->string('actnombre');

            $table->timestamps();

            $table->foreign('sex_id')->references('id')->on('sexos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actors');
    }
};
