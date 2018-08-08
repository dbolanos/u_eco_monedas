<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanjeMaterialReciclableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canje_material_reciclable', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_canje');
            $table->integer('centro_acopio_id')->unsigned();
            $table->foreign('centro_acopio_id')->references('id')->on('centro_acopios');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->decimal('total_eco_monedas');
            $table->text('detalles');
            $table->timestamps();
        });
        //Cambiar el indice del auto_increment, para que inicie en 1000
        DB::update("ALTER TABLE canje_material_reciclable AUTO_INCREMENT = 1000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('canje_material_reciclable');
    }
}
