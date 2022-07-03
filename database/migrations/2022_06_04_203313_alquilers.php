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
        Schema::create('alquilers', function (Blueprint $table) {
            $table->engine="InnoDB";
            
            $table->bigIncrements('id');
            $table->bigInteger('soc_id')->unsigned();
            $table->bigInteger('pel_id')->unsigned();
            $table->date('alqfechadesde');
            $table->date('alqfechahasta');
            $table->decimal('alqcosto', $precision = 4, $scale = 2);
            $table->date('alqfechaentrega');

            $table->timestamps();

            $table->foreign('soc_id')->references('id')->on('socios')->onDelete("cascade");
            $table->foreign('pel_id')->references('id')->on('peliculas')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alquilers');
    }
};
