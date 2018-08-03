<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialReciclablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_reciclables', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->string('ruta_imagen');
          $table->decimal('valor_ecomoneda');
          $table->string('color')->unique();
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
        Schema::dropIfExists('material_reciclables');
    }
}
