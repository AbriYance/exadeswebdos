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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->engine="InnoDB";
            
            $table->bigIncrements('id');
            $table->bigInteger('gen_id')->unsigned();
            $table->bigInteger('dir_id')->unsigned();
            $table->bigInteger('for_id')->unsigned();
            $table->string('pelnombre');
            $table->decimal('pelcosto', $precision = 10, $scale = 2);
            $table->date('pelfechaestreno');

            $table->timestamps();

            $table->foreign('gen_id')->references('id')->on('generos')->onDelete("cascade");
            $table->foreign('dir_id')->references('id')->on('directors')->onDelete("cascade");
            $table->foreign('for_id')->references('id')->on('formatos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
};
