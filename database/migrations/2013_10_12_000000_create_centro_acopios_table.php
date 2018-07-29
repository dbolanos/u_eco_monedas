<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentroAcopiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centro_acopios', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->integer('provincia_id')->unsigned();
          $table->string('direccion_exacta');
          $table->string('telefono');
          $table->integer('estado');
          $table->timestamps();
          $table->foreign('provincia_id')->references('id')->on('provincias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('centro_acopios', function (Blueprint $table) {
          $table->dropForeign('centro_acopios_provincia_id_foreign');
          $table->dropColumn('provincia_id');
      });

      Schema::dropIfExists('centro_acopios');
    }
}
