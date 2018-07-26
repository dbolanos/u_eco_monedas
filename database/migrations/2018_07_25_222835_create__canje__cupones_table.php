<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanjeCuponesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_canje__cupones', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_canje');
            $table->integer('centro_acopio_id')->unsigned();
            $table->foreign('centro_acopio_id')->references('id')->on('centro_acopio');
            $table->decimal('total_eco_monedas');
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
        Schema::dropIfExists('_canje__cupones');
    }
}
