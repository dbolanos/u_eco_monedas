<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCanjeCuponesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_detalle__canje__cupones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('material_reciclable_id')->unsigned();
            $table->foreign('material_reciclable_id')->references('id')->on('material_reciclable');
            $table->integer('canje_cupones_id')->unsigned();
            $table->foreign('canje_cupones_id')->references('id')->on('canje_cupones');
            $table->decimal('cantidad');
            $table->decimal('sub_total_eco_monedas');
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
        Schema::dropIfExists('_detalle__canje__cupones');
    }
}
