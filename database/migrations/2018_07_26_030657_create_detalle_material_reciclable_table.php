<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleMaterialReciclableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_material_reciclable', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('material_reciclable_id')->unsigned();
            $table->foreign('material_reciclable_id')->references('id')->on('material_reciclables');
            $table->integer('canje_material_reciclable_id')->unsigned();
            $table->foreign('canje_material_reciclable_id')->references('id')->on('canje_material_reciclable');
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
        Schema::dropIfExists('detalle_material_reciclable');
    }
}
