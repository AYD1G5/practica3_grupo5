<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritoProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_producto', function (Blueprint $table) {
            $table->increments('id_carrito_producto');
            $table->integer('id_carrito')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->text('nombre_producto')->nullable();
            $table->string('ruta_imagen')->nullable();
            $table->integer('cantidad')->unsigned()->nullable();
            $table->float('precio')->unsigned()->nullable();
            $table->float('subtotal')->unsigned()->nullable();
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
        Schema::dropIfExists('carrito_producto');
    }
}
