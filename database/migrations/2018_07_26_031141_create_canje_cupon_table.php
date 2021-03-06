<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanjeCuponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canje_cupon', function (Blueprint $table) {
            $table->increments('id');
            //$table->dateTime('fecha_canje_cupon');
            //$table->decimal('total_eco_monedas');
            //$table->dateTime('fecha_canje');
            //$table->integer('cupon_id')->unsigned();
            //$table->foreign('cupon_id')->references('id')->on('cupons');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');          
            $table->text('cart');
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
        Schema::dropIfExists('canje_cupon');
    }
}
